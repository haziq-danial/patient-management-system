<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class ManagePatientController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $patients = Patient::get();
        $count = 1;
        return view('ManagePatient.index', [
            'count' => $count,
            'patients' => $patients
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        $patient->save();

        return redirect()->route('manage-patient.view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $patient_id
     */
    public function show($patient_id)
    {
        $patient = Patient::find($patient_id);
        return view('ManagePatient.show',[
            'patient' => $patient
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $patient_id
     */
    public function edit($patient_id)
    {
        $patient = Patient::find($patient_id);

        return view('ManagePatient.edit', [
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $patient_id
     */
    public function update(Request $request, $patient_id)
    {
        $patient = Patient::find($patient_id);
        $patient->update($request->all());
        return redirect()->route('manage-patient.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $patient_id
     */
    public function destroy($patient_id)
    {
        $patient = Patient::find($patient_id);
        $patient->delete();

        return redirect()->route('manage-patient.view');
    }
}
