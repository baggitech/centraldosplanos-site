<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index')->with('status', 'Usuário adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        $user->load('profile');
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user, Request $request)
    {
        //
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'exclude_if:password,null|required|string|min:8|confirmed',
        ]);
        
        $user->fill($input);
        if ($request->filled('password')) {
            $user->password = bcrypt($input['password']);
        }
        $user->save();

        return redirect()->route('users.index')->with('status', 'Usuário editado com sucesso.');
        

    }

    public function updateProfile(User $user, Request $request)
    {
        //
        $input = $request->validate([
            'type' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);
        
        UserProfile::updateOrCreate(
            ['user_id' => $user->id], $input);

        return redirect()->route('users.index')->with('status', 'Perfil do usuário editado com sucesso.');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return back()->with('status', 'Usuário deletado com sucesso.');
    }
}
