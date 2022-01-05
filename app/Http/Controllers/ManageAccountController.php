<?php

namespace App\Http\Controllers;

use App\Classes\Constants\RoleType;
use App\Models\Admin;
use App\Models\Medical;
use App\Models\Technician;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageAccountController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_model = Auth::user();
        $user_type = [
            RoleType::MEDICAL => Medical::where('user_id', $user_model->user_id)->with('detail')->first(),
            RoleType::TECHNICIAN => Technician::where('user_id', $user_model->user_id)->with('detail')->first(),
            RoleType::ADMIN => Admin::where('user_id', $user_model->user_id)->with('detail')->first()
        ];
        $user = $user_type[$user_model->role_type];

        dd($user);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id)
    {
        $user_model = User::find($user_id);
        $user_type = [
            RoleType::MEDICAL => Medical::where('user_id', $user_model->user_id)->with('detail')->first(),
            RoleType::TECHNICIAN => Technician::where('user_id', $user_model->user_id)->with('detail')->first(),
            RoleType::ADMIN => Admin::where('user_id', $user_model->user_id)->with('detail')->first()
        ];

        $user_model->update($request->except('staff_id'));
        $user_type->update($request->only('staff_id'));

        dd($user_type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        $user_model = User::find($user_id);

        $user_type = [
            RoleType::MEDICAL => Medical::where('user_id', $user_model->user_id)->with('detail')->first(),
            RoleType::TECHNICIAN => Technician::where('user_id', $user_model->user_id)->with('detail')->first(),
            RoleType::ADMIN => Admin::where('user_id', $user_model->user_id)->with('detail')->first()
        ];
    }
}
