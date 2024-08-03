<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Faker\Core\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        $user_data = User::all()->where('role_id', '2');
        $role_data = Role::all();
        return view('admin.users.index', compact('user_data', 'role_data'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validate_data = $request->validate([
            'username' => 'required|string|min:6',
            'password' => 'required|string|min:6',
            'f_name' => 'required|string',
            'l_name' => 'required|string',
            'genders' => 'required|string',
            'role_id' => 'required'
        ]);

        $user = new User();
        $user->username = $validate_data['username'];
        $user->password = bcrypt($validate_data['password']);
        $user->f_name = $validate_data['f_name'];
        $user->l_name = $validate_data['l_name'];
        $user->genders = $validate_data['genders'];
        $user->role_id = $validate_data['role_id'];


        // Save the user to the database
        $user->save();

        if (isset($user)) {
            return redirect()->route('users.index')->with('success', 'Data store with Successfully');
        } else {
            return redirect()->route('users.index')->with('error', 'Data not to Store');
        }
    }

    public function edit($id)
    {
        $user_data = User::find($id);

        return view('admin.users.edit', compact('user_data','id'));
    }

    public function update($id, Request $request)
    {


        $validate_data = $request->validate(
            [
                'username' => 'required|string|min:6|max:20',
                'password' => '',
                'f_name' => 'required|string',
                'l_name' => 'required|string',
                'genders' => 'required|string',
                'role_id' => 'required'
            ],
            [
                'username.min' => 'Username ต้องมีความยาวอย่างน้อย 6 ตัวอักษร',
                'username.max' => 'Username ห้ามยาวเกิน 20 ตัวอักษร',
                'f_name' => 'Firstname ต้องเป็นตัวอักษรเท่านั้น',
                'l_name' => 'Lastname ต้องเป็นตัวอักษรเท่านั้น',
                'genders' => 'Genders ต้องเป็นตัวอักษรเท่านั้น',
            ]
        );
        $user_data = User::find($id);
        $user_data->username = $validate_data['username'];
        $user_data->password = bcrypt($validate_data['password']);
        $user_data->f_name = $validate_data['f_name'];
        $user_data->l_name = $validate_data['l_name'];
        $user_data->genders = $validate_data['genders'];
        $user_data->role_id = $validate_data['role_id'];
        $user_data->save();

        if (isset($user_data)) {
            return redirect()->route('users.index')->with('success', 'Data Update with Successfully');
        } else {
            return redirect()->route('users.index')->with('error', 'Data not to Update');
        }
    }
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'Data Delete with Successfully');;
    }
}
