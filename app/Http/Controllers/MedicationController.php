<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
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
        $medications = Medication::all();
        $count = 1;
        return view('ManageMedication.index', [
            'medications' => $medications,
            'count' => $count
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $medication = Medication::create($request->all());
        $medication->save();

        return redirect()->route('manage-medication.view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $medication_id
     */
    public function show(int $medication_id)
    {
        $medication = Medication::find($medication_id);
        return view('ManageMedication.show', [
            'medication' => $medication
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $medication_id
     */
    public function edit(int $medication_id)
    {
        $medication = Medication::find($medication_id);

        return view('ManageMedication.edit', [
            'medication' =>  $medication
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $medication_id
     */
    public function update(Request $request, int $medication_id)
    {
        $medication = Medication::find($medication_id);
        $medication->update($request->all());

        return redirect()->route('manage-medication.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $medication_id
     */
    public function destroy(int $medication_id)
    {
        $medication = Medication::find($medication_id);
        $medication->delete();

        return redirect()->route('manage-medication.view');
    }
}
