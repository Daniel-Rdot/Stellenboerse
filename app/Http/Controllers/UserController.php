<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('users.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation
        $formFields = $request->validate(User::validationRules());

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Store new user in database
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        // ??? Hier käme Email Verification?
        return redirect('/')->with('message', 'Account erfolgreich angelegt');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        //  ??? Autorisierung des authentifizierten Users zur Bearbeitung von $user erfolgt über Policy nehm ich an

        // Validation
        $formFields = $request->validate(User::validationRules());

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Update database entry
        $user->update($formFields);

        return redirect('users.show', ['user' => $user])->with('message', 'Änderungen erfolgreich');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        //  ??? Autorisierung des authentifizierten Users zur Bearbeitung von $user erfolgt über Policy nehm ich an

        // Remove from storage
        $user->delete();

        return redirect('/')->with('message', 'Account gelöscht');
    }

    // ??? Authentication / Login / Logout methods hier?
}
