<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate(3);
        return view('admin.cursos.home',compact('cursos'));
    }
}
