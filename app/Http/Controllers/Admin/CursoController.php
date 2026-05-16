<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Curso;

class CursoController extends Controller
{
    //
    public function index() {
        $rows = Curso::all();
        return view('Admin.cursos.index', compact('rows'));
    }

    public function adicionar() {
    return view('admin.cursos.adicionar');
    }
    public function editar($id) {
    // repare que ele recebe o id da ROTA
    $linha = Curso::find($id);
    // carrega o registro (realiza um select e um fetch internamente)
    return view('admin.cursos.editar',compact('linha'));
    // manda o registro encontrado para ser editado na visão
    }
    public function excluir($id) {
    // repare que ele recebe o id da ROTA
    Curso::find($id)->delete();
    // apos selecionar o registro, é chamado o
    // método DELETE do OBJETO registro
    return redirect()->route('admin.cursos');
    // abre a visão da lista de cursos
}

}


