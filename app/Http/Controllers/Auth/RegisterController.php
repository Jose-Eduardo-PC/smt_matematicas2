<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\File;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            dd($validator->errors()); // Muestra los errores y detiene la ejecución del script
        }

        return $validator;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $avatarPath = null;
        if (isset($data['avatar'])) {
            $avatar = $data['avatar'];
            $filename = time() . '.' . pathinfo($avatar, PATHINFO_EXTENSION);
            $avatarPath = 'public/avatars/' . $filename;
            Storage::disk('local')->put($avatarPath, file_get_contents($avatar));
        }

        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'avatar' => $avatarPath,
            'password' => Hash::make($data['password']),
        ])->assignRole('Usuario');
    }


    public function showRegistrationForm()
    {
        // Supongamos que tienes los avatares almacenados en public/avatars
        $avatars = File::files(public_path('avatars'));

        // Convertir cada archivo a una URL
        $avatarUrls = array_map(function ($file) {
            return asset('avatars/' . $file->getFilename());
        }, $avatars);

        return view('auth.register', ['avatars' => $avatarUrls]);
    }
}
