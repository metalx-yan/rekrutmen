<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        $users = User::all();

        return view('users.index', compact('roles', 'users'));
    }

    public function viewData($id)
    {
        $view = User::find($id);
        // $roles = Role::all();
        return view('users.view', compact('view', 'roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:20|unique:users',
            // 'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => 'user',
            'role_id' => $request->role_id,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $roles = Role::all();

        return view('users.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'username' => "required|unique:users,username,$id|max:20|string",
            'name' => 'required|string|max:60',
            // 'password' => 'required|string|min:6|confirmed',
            'role_id' => 'required'
        ]);

        $user           = User::findOrFail($id);
        $user->name     = $request->name;
        $user->username = $request->username;
        // $user->password = $request->password;
        $user->role_id  = $request->role_id;
        $user->save();

        return redirect()->route('user.index');
    }

    public function updatePassword(Request $request, $id)
    {
        // dd($request);
        
        $update = $request->validate([
            'password' => 'required|string|min:6|confirmed',
        ]);
        $update                 = User::findOrFail($id);
        $update->password       = $request->password;
        $update->save();
        
        return redirect()->back();
    }

    public function resetPassword(Request $request, $id)
    {
        // dd($request);
        $update                 = User::findOrFail($id);
        $update->password       = 'user';
        $update->save();
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);

        $users->delete();

        return redirect()->back();
    }
}
