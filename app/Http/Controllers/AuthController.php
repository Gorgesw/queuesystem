<?php

namespace App\Http\Controllers;

use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function login() {
        return view('auth.login');
    }

    public function loginSubmit(Request $request) {
        $request->validate(
            [
                'username' => 'required|email',
                'password' => 'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,16}$/'
            ],
            [
                'username.required' => 'O Campo Úsuario é de preenchimento obrigatório!',
                'username.email' => 'O Campo Email não possui um valor válido!',
                'password.required' => 'O Campo senha é de preenchimento obrigatório',
                'password.regex' => 'A senha deve conter entre 6 e 16 caracteres, ter uma letra Maiúscula, uma Minúscula e um Número'
            ],
        );

        //Autenticão do usuário
        $user = User::where('email', trim($request->username))
            ->where('active', true)
            ->whereNull('deleted_at')
            ->where(function($query) {
                $query->whereNull('blocked_until')
                    ->orWhere('blocked_until', '<', now());
            })
            ->first();

        //Verifica se a senha e email existem para realizar login
        if ($user && Hash::check(trim($request->password), $user->password)) {
            $this->loginUser($user);
            return redirect()->route('home');
        } else {
            return redirect()->back()->withInput()->with('server_error', 'Senha ou usuário inválido.');
        }

    }

    private function loginUser($user) {
        //atualiza o ultimo login e atualiza os dados.
        $user->last_login = now();
        $user->code = null;
        $user->code_expiration = null;
        $user->blocked_until = null;
        $user-> save();

        //Insere o usuario na sessao
        Auth::login($user);
    }


    public function logout() {
       auth()->logout();
       session()->invalidate();
       session()->regenerateToken();

       return redirect()->route('login');
    }

    public function changePassword() {
        return view('auth.change_password', ['subtitle' => 'Alterar Senha']);
    }

    public function changePasswordSubmit(Request $request) {
        $request->validate(
            [
                'current_password' => 'required',
                'new_password' =>'required|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z\d]{6,16}$/|confirmed'   
            ],
            [
                'current_password' =>'A senha Atual é obrigatória!',
                'new_password.required' => 'A nova senha é obrigatória!', 
                'new_password.regex' => 'A nova senha deve conter entre 6 e 16 caracteres, ter uma letra Maiúscula, uma Minúscula e um Número,',
                'new_password.confirmed' => 'As senhas informadas não estão iguais.',
            ]
        );

        $user = Auth::user();

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
            $user->save();

            return redirect()->route('home')->with('Senha Alterada Com Sucesso!');
        } else {
            return redirect()->back()->with('server_error', 'Senha atual inválida');
        }
    }
}
