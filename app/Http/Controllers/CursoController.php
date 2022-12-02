<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CursoController
{
    public function index()
    {
        //dd('admin.cursos.index');
        return view('admin.cursos.index');
    }
}
