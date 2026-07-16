<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index(Request $request)
{
    $search = $request->search;

    $users = User::when($search, function ($query) use ($search) {

        $query->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('phone', 'like', "%{$search}%");

    })
    ->latest()
    ->paginate(10);

    return view('admin.users.index', compact('users'));
}


    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();


        return redirect()
            ->route('users.index')
            ->with('success','Utilisateur supprimé avec succès');
    }

     public function edit(string $id)
    {
    $user = User::findOrFail($id);

    return view('admin.users.edit', compact('user'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'phone' => 'required',
        'ville' => 'required',
        'role'  => 'required',
    ]);

    $user = User::findOrFail($id);

    $user->update([
        'name'  => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'ville' => $request->ville,
        'role'  => $request->role,
    ]);

    return redirect()
        ->route('users.index')
        ->with('success', 'Utilisateur modifié avec succès.');
}

}