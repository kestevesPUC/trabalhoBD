<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use App\Models\Curso;

class ContatoController extends Controller
{
    /*public function index()
    {
        return view('admin.cursos.home');
    }*/
    public function adicionar()
    {
        return view('admin.cursos.adicionar');
    }
    public function criar(Request $req)
    {
        dd($req['nome']);
        return "Esse é o criar do ContatoController";
    }
    public function editar($id)
    {
        $registro = Curso::find($id);
        return view('admin.cursos.editar',compact('registro'));
    }
    public function cursos()
    {
        $registros= Curso::all();
        return view('contato.index', compact( 'registros'));
    }

    public function salvar(Request $req)
    {

        $dados = $req->all();

        if(isset($dados['publicado'])){
            $dados['publicado'] = 1;
        } else {
            $dados['publicado'] = 0;
        }

        if($req->hasFile('imagem'))
        {
            $imagem=$req->file('imagem');
            $num= rand(1111,9999);
            $dir = "img/cursos";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir.'/'.$nomeImagem;
        }
        $curso = new Curso;
        $curso->titulo = $dados['titulo'];
        $curso->descricao = $dados['descricao'];
        $curso->valor = $dados['valor'];
        $curso->imagem = $dados['imagem'];
        $curso->publicado = $dados['publicado'] ? 1 : 0;
        $curso->save();

        return redirect()->route('admin.cursos');
    }

    public function atualizar(Request $req,$id)
    {
        $dados = $req->all();

        if(isset($dados['publicado'])){
            $dados['publicado'] = 1;
        } else {
            $dados['publicado'] = 0;
        }

        // $dados['publicado'] = $dados['publicado'] ? 1 : 0;

        if($req->hasFile('imagem'))
        {
            $imagem=$req->file('imagem');
            $num= rand(1111,9999);
            $dir = "img/cursos";
            $ex = $imagem->guessClientExtension();
            $nomeImagem = "imagem_".$num.".".$ex;
            $imagem->move($dir,$nomeImagem);
            $dados['imagem'] = $dir.'/'.$nomeImagem;
        }


        Curso::find($id)->update($dados);

        return redirect()->route('admin.cursos');
    }

    public function deletar($id)
    {
        Curso::find($id)->delete();
        return redirect()->route('admin.cursos');
    }
    

}

