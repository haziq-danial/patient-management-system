<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use App\Models\Patient;
use App\Models\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param int $patient_id
     */
    public function index(int $patient_id)
    {
        $prescription = Prescription::with(['patient', 'assignee'])
            ->where('patient_id', $patient_id)
            ->get();
        $count = 1;
        return view('ManagePrescription.index', [
            'prescriptions' => $prescription,
            'patient_id' => $patient_id,
            'count' => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param int $patient_id
     */
    public function create(int $patient_id)
    {
        $patient = Patient::find($patient_id);
        $medications = Medication::all();
        return view('ManagePrescription.create', [
            'patient' => $patient,
            'medications' => $medications
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $patient_id
     */
    public function store(Request $request, int $patient_id)
    {
        $prescription = Prescription::create([
            'user_id' => Auth::id(),
            'patient_id' => $patient_id,
            'comment' => $request->comment,
            'medications' => json_encode($request->medication_id)
        ]);

        return redirect()->route('manage-prescription.show', $prescription->prescription_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $prescription_id
     */
    public function show(int $prescription_id)
    {
        $prescription = Prescription::find($prescription_id);
        $med_ids = json_decode($prescription->medications);
        $medications = [];
        foreach ($med_ids as $med_id)
        {
            $medications[] = Medication::find($med_id);
        }
//        dd($medications);

        return view('ManagePrescription.show', [
            'prescription' => $prescription,
            'medications' => $medications
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $prescription_id
     */
    public function edit(int $prescription_id)
    {
        $prescription = Prescription::find($prescription_id);
        $medications = Medication::all();
        return view('ManagePrescription.edit', [
            'prescription' => $prescription,
            'medications' => $medications
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $prescription_id
     */
    public function update(Request $request, int $prescription_id)
    {
        $prescription = Prescription::find($prescription_id)
            ->update([
                'comment' => $request->comment,
                'medications' => json_encode($request->medication_id)
            ]);
        $model = Prescription::with('patient')->find($prescription_id);
        $patient_id = $model->patient->patient_id;
//        dd($model->patient->patient_id);
        return redirect()->route('manage-prescription.index', ['patient_id' => $patient_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $prescription_id
     */
    public function destroy(int $prescription_id)
    {
        $model = Prescription::find($prescription_id);
        $patient_id = $model->patient->patient_id;
        $model->delete();
        return redirect()->route('manage-prescription.index', ['patient_id' => $patient_id]);
    }
}
