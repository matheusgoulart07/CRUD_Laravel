<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;

class AlunoController extends Controller
{
    //
    public function index() {
        $rows = Aluno::all();
        return view('Admin.alunos.indexAlunos', compact('rows'));
    }

    public function adicionar() {
    return view('admin.alunos.adicionarAlunos');
    }
    public function editar($id) {
    // repare que ele recebe o id da ROTA
    $linha = Aluno::find($id);
    // carrega o registro (realiza um select e um fetch internamente)
    return view('admin.alunos.editarAlunos',compact('linha'));
    // manda o registro encontrado para ser editado na visão
    }
    public function excluir($id) {
    // repare que ele recebe o id da ROTA
    Aluno::find($id)->delete();
    // apos selecionar o registro, é chamado o
    // método DELETE do OBJETO registro
    return redirect()->route('admin.alunos');
    // abre a visão da lista de cursos
}

    public function salvar(Request $req)
    {
    $dados = $req->all();
    if(isset($dados['publicado'])){
    $dados['publicado'] = 'sim';
    }else{
    $dados['publicado'] = 'nao';
    }
    if($req->hasFile('arquivo')){
    $imagem = $req->file('arquivo');
    $num = rand(1111,9999);
    $dir = "img/alunos/";
    $ex = $imagem->guessClientExtension();
    $nomeImagem = "imagem_".$num.".".$ex;
    $imagem->move($dir,$nomeImagem);
    $dados['imagem'] = $dir."/".$nomeImagem;
    }
    Aluno::create($dados);
    return redirect()->route('admin.alunos');
}

    public function atualizar(Request $req, $id)
    {
    $dados = $req->all();
    if(isset($dados['publicado'])){
    $dados['publicado'] = 'sim';
    }else{
    $dados['publicado'] = 'não';
    }
    if($req->hasFile('arquivo')){
    $imagem = $req->file('arquivo');
    $num = rand(1111,9999);
    $dir = "img/alunos/";
    $ex = $imagem->guessClientExtension();
    $nomeImagem = "imagem_".$num.".".$ex;
    $imagem->move($dir,$nomeImagem);
    $dados['imagem'] = $dir."/".$nomeImagem;
    }
    Aluno::find($id)->update($dados);
    return redirect()->route('admin.alunos');
    }
}
