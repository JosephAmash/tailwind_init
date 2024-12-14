<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
   public function showRegistrationForm()
 {
       return view('register');
   }


    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:20',
            'email'=> 'required|string|email|max:100|unique:user',
            'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'name'=> $request->name,
                'email'=> $request->email,
                'password'=> Hash::make($request->password),
            ]);

            Auth::login($user); // Войти после успешной регистрации

            return redirect()->route('welcome');
        }


    // Показывает форму входа
       public function showLoginForm()
       {
          return view('login');
     }



     // Обрабатывает вход пользователя
         public function login(Request $request) {
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password'=> 'required|string',
            ]);

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->route('welcome');
            }
                throw ValidationException::withMessages([
                    'email' => __('Die angegebenen Anmeldeinformationen stimmen nicht mit unseren Aufzeichnungen überein.'),
                ]);

        }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');

    }



}
