<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index');
    }
    public function entrar(request $req)
    {
        $dados = $req->all();
        return Auth::attempt(['email' => $dados['email'], 'password' => $dados['senha']]) ?
            response()->json(['success' => true]) : response()->json(['success' => false,'message' => 'Email ou senha incoretos!']);
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
    public function usuario()
    {
        return view('admin.cursos.user');
    }
    public function editUser(Request $req)
    {
        $dadosUser = $req->all();

        $user = new User();

        $sobrenome = $dadosUser['last_name'];
        $user->first_name = $dadosUser['first_name']." $sobrenome";

        //Verifica se os campos das senhas são iguais
        if($dadosUser['newpassword'] == $dadosUser['confirmpassword']){
            $user->password = $dadosUser['newpassword'];
        }
            $user->email = $dadosUser['newemail'];

            $dadosTransferir = [
                'name'    => $user->first_name,
                'password'=> bcrypt($dadosUser['newpassword']),
                'email'   => $dadosUser['newemail'],
            ];

        //Manda para o banco de dados
        User::find(Auth::id())->update($dadosTransferir);

        return redirect()->route('site.login.sair');
    }
    public function newUser(Request $req)
    {
        $usuario = $req->all();

        $user = new User();
        $user->name= $usuario['inpt_nome'];

        if($usuario['inpt_senha']==$usuario['password_confirm']){
            $user->password = bcrypt($usuario['inpt_senha']);
        }else{
            dd('senha incorreta');
        }

        $user->email= $usuario['inpt_email'];
        $user->save();

        return redirect()->route('site.login.sair');

    }

}
