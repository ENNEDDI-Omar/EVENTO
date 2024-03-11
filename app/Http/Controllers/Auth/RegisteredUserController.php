<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Establishment;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),


        ]);

        $role = Role::where('name', 'administrator')->first();
        $user->roles()->attach($role);
           
        event(new Registered($user));

        Auth::login($user);

        if ($user->hasRole('administrator')) {
            return redirect()->route('administrator.dashboard.index');
        } elseif ($user->hasRole('spectator')) {
            return redirect()->route('home');
        }

        return redirect()->route('dashboard');
    }



    // $roles = $user->roles(); // Utilisez des parenthèses pour appeler la relation

    // if (!$roles->get()->isEmpty() && $roles->first() !== null) {
    //     switch ($roles->first()->name) {
    //         case 'administrator':
    //             return redirect()->route('administrator.dashboard.index');
    //             break;
    //         case 'spectator':
    //             return redirect()->route('spectator.home.index');
    //             break;
    //         // Gérer d'autres cas si nécessaire
    //     }

    //////////////////////ma deuxieme methode pour l'organisateur:

    // public function storeOrganisator(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'establishment_name' => ['required', 'string', 'max:255'],
    //     ]);

    //     $establishment = Establishment::create([
    //         'name' => $request->establishment_name,
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'establishment_id' => $establishment->id,
    //         'status' => 'pending',
    //     ]);

    //     $user->assignRole('organisator');

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME);
    // }















    ///////////////////////////logique differente:

    // public function storeTwo(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //         'user_type' => ['required', 'string', 'in:spectator,organizer'],
    //         'establishment_name' => ['required_if:user_type,organizer', 'string', 'max:255'],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     // Assigner le rôle en fonction du type d'utilisateur
    //     $roleName = ($request->user_type === 'organizer') ? 'organizer' : 'spectator';
    //     $user->assignRole($roleName);

    //     // Ajouter des attributs spécifiques au type d'utilisateur
    //     if ($request->user_type === 'organizer') {
    //         $establishment = Establishment::create(['name' => $request->establishment_name]);
    //         $user->update(['establishment_id' => $establishment->id]);
    //     }

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(RouteServiceProvider::HOME);
    // }
}
