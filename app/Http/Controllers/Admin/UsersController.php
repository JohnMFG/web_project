<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));


//        $users = User::join('operator', 'operator.id', '=', 'users.id')
//            ->select('users.*')
//            ->get();
//        return view('admin.users.index', compact('users'));

//        $users = DB::table('users')
//            ->join('operator', 'operator.id', '=', 'users.operator_id')
//            ->select('users.*', 'operator.name as op_name')
//            ->get();
//        return view('admin.users.index', compact('users1'));
//
//        $users = DB::table('users')
//            ->join('user_has_roles', 'user_has_roles.user_id', '=', 'users.id')
//            ->select('users.id', 'users.name', 'users.email', 'users.operator_id', 'user_has_roles.role_id')
//            ->get();
//        return view('admin.users.index', compact('users'));




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'id');
        $roles->prepend('---Please select---', 0);
        $roles->all();

        return view('admin.users.form', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'operator_id' => 'nullable|numeric'
        ],[
            'name.required' => 'Name is required.',
            'name.min:2' => 'Name is to short',
            'email.required' => 'Email is required.',
            'email.email' => 'It has to be email!',
            'password.required' => 'Password is required.',
            'password.min:8' => 'Password must be minimum of 8 characters!',
            'operator_id.numeric' => 'Only numbers!'
        ]);


        $user = User::create($request->all());
        $user->assignRole($request->roles);

        return redirect('admin/users')->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        $roles = Role::pluck('name', 'id');
        $roles->prepend('---Please select---', 0);
        $roles->all();

        $selected_roles[] = array();
        foreach ($user->roles as $role) {
            $selected_roles[] = $role->id;
        }

        return view('admin.users.form', compact('user', 'roles', 'selected_roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:1',
            'email' => 'required|email',
            'operator_id' => 'nullable|numeric'
        ],[
            'name.required' => 'Name is required.',
            'name.min:1' => 'Name is to short',
            'email.required' => 'Email is required.',
            'email.email' => 'It has to be email!',
            'operator_id.numeric' => 'Only numbers!'
        ]);




        $user = User::findOrFail($id);
        $user->update($request->all());
        $user->syncRoles($request->roles);

        return redirect('admin/users')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('admin/users')->with('success', 'User deleted successfully.');
    }
}
