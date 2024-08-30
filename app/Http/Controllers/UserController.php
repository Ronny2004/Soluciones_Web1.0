<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $users = User::query()
            ->where('name', 'like', "%{$search}%")
            ->orWhere('email', 'like', "%{$search}%")
            ->get();
    
        $roles = Role::all();
    
        return view('users.index', compact('users', 'roles'));
    }
    

    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles para el dropdown
        return view('users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id', // Validar que role_id sea válido
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id, // Asignar role_id
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        $roles = Role::all(); // Obtener todos los roles para el dropdown
        return view('users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'role_id' => 'required|exists:roles,id', // Validar que role_id sea válido
        ]);

        if ($validator->fails()) {
            return redirect()->route('users.edit', $user->id)
                             ->withErrors($validator)
                             ->withInput();
        }

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->role_id = $request->role_id; // Asignar role_id
        $user->save();

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
    // Ubicación: App\Http\Controllers\UserController.php

public function destroy($id)
{
    // Busca el usuario por su ID
    $user = User::findOrFail($id);

    // Elimina el usuario
    $user->delete();

    // Redirige a la lista de usuarios con un mensaje de éxito
    return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
}

}
