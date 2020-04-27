<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Wordpress\Projeto;
use App\Model\Wordpress\Categoria;
use Illuminate\Http\Request;

class WordpressController extends Controller
{
    public function projetos()
    {
        $data = Projeto::published()->get();

        return response()->json($data);
    }

    public function categorias()
    {
        $categoria = new Categoria();
        $data = $categoria->retornaCategorias();

        return response()->json($data);
    }

    public function projetosPorCategoria(Request $request, $categoriaid)
    {
        $projeto = new Projeto();
        $data = $projeto->retornaProjetosPorCategoria($categoriaid);

        return response()->json($data);
    }

    public function projetoPorId(Request $request, $id)
    {
        $projeto = Projeto::find($id);
        $projeto = [
            'id' => $projeto->ID,
            'slug' => $projeto->slug,
            'post_date' => $projeto->post_date,
            'post_title' => $projeto->post_title,
            'post_status' => $projeto->post_status,
            'image' => $projeto->image,
            'keywords' => $projeto->keywords,
            'post_content' => $projeto->post_content
        ];
        return response()->json($projeto);
    }
}
