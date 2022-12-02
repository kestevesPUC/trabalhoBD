@extends('layout.site')

@section('titulo', 'Contatos')

@section('conteudo')
    <div class="container">
        <h3 class="center">Adicionar Curso</h3>
            <div class="row">
                <form class="" method="POST" enctype="multipart/form-data" action="{{route('admin.cursos.salvar')}}">
                        @csrf
                        @include('admin.cursos._form')

                </form>
            </div>
    </div>
@endsection
