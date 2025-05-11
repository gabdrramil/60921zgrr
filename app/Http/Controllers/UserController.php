<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ( 'user', [
            'users' => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' =>'required|unique:users|max:255',
            'email' =>'required|unique:users|max:255',
            'password' =>'required:users|max:255',
            'isadmin' => 'required|in:0,1',
        ]);
        $validated['isadmin'] = (int)$validated['isadmin'];
        $user = new User($validated);
        $user ->save();
        return redirect('/user');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view ( 'user', [
            'user' => User::all()->where('id', $id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('user_edit',[
            'user' => User::all()->where('id',$id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|max:255|unique:users,name,'.$user->id,
            'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            'password' => 'sometimes|max:255',
            'isadmin' => 'required|in:0,1'
        ]);

        // Обновляем пароль только если он был указан
        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'isadmin' => $validated['isadmin']
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = $validated['password'];
        }

        $user->update($updateData);

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        User::destroy($id);
        return redirect('/user');
    }
}
