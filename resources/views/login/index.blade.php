@extends('layout.site')

@section('titulo', 'Contatos')

@section('conteudo')
    <div class="container dvEntrar">
        <h3 class="center">Login</h3>
            <div class="row">
                <form class=""enctype="multipart/form-data">
                        @csrf
                            <div class="container ">
                                    <div class="input-field">
                                        <input type="text" id="email"name="email" >
                                        <label >E-Mail</label>
                                    </div>
                                    <div class="input-field ">
                                        <input type="password" id="senha" name="senha" >
                                        <label >Senha</label>
                                    </div>
                                    <div>
                                        <a href="#" id="btn_fadeinput" >Não possui cadastro? Clique aqui</a>
                                    </div>

                                    <br>
                                    <div>
                                        <a type="submit" class="btn deep-orange" id="login-btn">Entrar</a>
                                    </div>

                            </div>
                </form>
                <div class="container">
                    <form class="" method="POST" enctype="multipart/form-data" action="{{ route('site.newUser') }}">
                        <div class="input-field dv_login" >
                            <div class="row" id="dv_CriarUsuario_fade" align="center" style="display: none;"><h2>Criar Usuário</h2></div>
                            <input type="text" placeholder="Nome" value="{{isset($usuario->inpt_nome)}}" name="inpt_nome" id="inpt_nome" style="display: none;" >
                            <input type="text" placeholder="E-mail" value="{{isset($usuario->inpt_email)}}" name="inpt_email" id="inpt_email" style="display: none;" >
                            <input type="password" placeholder="Senha" value="{{isset($usuario->inpt_senha)}}" name="inpt_senha" id="inpt_senha" style="display: none;" >
                            <input type="password" placeholder="Confirme a Senha" value="{{isset($usuario->password_confirm)}}" name="password_confirm" id="password_confirm" style="display: none;" >
                        </div>
                        <button class="btn deep-orange" id="criar_btn" type="submit" style="display: none">Criar</button>
                    </form>
                </div>
            </div>
    </div>
@endsection
