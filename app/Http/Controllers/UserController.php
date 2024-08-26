<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        User::create($request->all());
        return redirect()->route('users.index');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Valida los datos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|confirmed|min:8',
        ]);
    
        // Actualiza el nombre y el email
        $user->name = $validated['name'];
        $user->email = $validated['email'];
    
        // Si se proporciona una nueva contraseña, actualízala
        if ($request->filled('password')) {
            $user->password = bcrypt($validated['password']);
        }
    
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}
