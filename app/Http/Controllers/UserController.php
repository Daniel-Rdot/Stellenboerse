<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $data = $request->validate(['first_name' => 'string']);

        $users = User::query()
            ->when(isset($data['first_name']), function ($query) use ($data) {
                $query->where('first_name', 'LIKE', '%' . $data['first_name'] . '%');
            })
            ->paginate();

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', ['user' => new User()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): View
    {
        $data = $request->validate(User::validationRules());

        $user = $this->userRepository->updateOrCreate($data, $request);

        // ??? Hier käme Email Verification?
        return view('users.show', ['user' => $user->load('images')])->with('message', trans('app.successfully_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): View
    {
        return view('users.show', ['user' => $user->load('images')]);
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
    public function update(Request $request, User $user): View
    {
        $data = $request->validate(User::validationRules($user));

        $this->userRepository->updateOrCreate($data, $request, $user);

        return view('users.show', ['user' => $user])->with('message', trans('app.successfully_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return redirect('/home')->with('message', trans('app.successfully_deleted'));
    }

    // ??? Authentication / Login / Logout methods hier?
}
