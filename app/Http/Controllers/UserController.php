<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all(); // Obtener todos los roles para asignar
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|exists:roles,id',
             // Validar que el rol exista
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // Asignar el rol al usuario
        $role = Role::find($request->role);
        $user->assignRole($role);

        return redirect()->route('user.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all(); // Obtener todos los roles para asignar
        return view('user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|exists:roles,id',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $role = Role::find($request->role);
        $user->syncRoles([$role]);

        return redirect()->route('user.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Usuario eliminado correctamente.');
    }
}
