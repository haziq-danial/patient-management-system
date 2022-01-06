<?php

namespace App\Http\Controllers;

use App\Classes\Constants\RoleType;
use App\Models\Admin;
use App\Models\Medical;
use App\Models\Technician;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManageAccountController extends Controller
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
//        $user_model = User::find(Auth::id());
        $user_model = User::find(Auth::id());

        $user_type = get_user_type($user_model);

        return view('ManageAccount.index', [
            'user' => $user_model,
            'user_type' => $user_type
        ]);
    }

    public function edit()
    {
        $user_model = User::find(Auth::id());

        $user_type = get_user_type($user_model);

        return view('ManageAccount.edit', [
            'user' => $user_model,
            'user_type' => $user_type
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     */
    public function update(Request $request, $user_id)
    {
        $user_model = User::find($user_id);
        $user_type = get_user_type($user_model);

        $user_model->update($request->except('staff_id'));
        $user_type->update($request->only('staff_id'));

        return redirect()->route('manage-account.view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $user_id
     */
    public function destroy($user_id)
    {
        $user_model = User::find($user_id);

        $user_type = get_user_type($user_model);

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
