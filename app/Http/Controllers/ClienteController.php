<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastroproduto;
use App\Models\pedido;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function ClienteProduto()
    {
        $produto = cadastroproduto::paginate(6)->withQueryString();

        $categorias = DB::select('SELECT cat.categoria, subcat.id, subcat.subcategoria, subcat.categoriaPai  FROM categorias as cat INNER JOIN subcategorias as subcat ON cat.id = subcat.categoriapai');
        $data = [
            'categorias' => $categorias,
            'produto' => $produto
        ];

        return view('Front.ClienteProduto', $data);
    }

    public function SubPagina($id, Request $request)
    {
        $peca = cadastroproduto::select("*")->where([["id", "=", $id]])->get();
        return view('Front.ClientePeca', compact('peca'));
    }
    public function subcategoria($id)
    {
        $produto = cadastroproduto::where('subcategoria', $id)->paginate(4)->withQueryString();
        if(isset($produto)){
            $produto = "Nenhum produto encontrado";
        }
        $categorias = DB::select('SELECT cat.categoria, subcat.id, subcat.subcategoria, subcat.categoriaPai  FROM categorias as cat INNER JOIN subcategorias as subcat ON cat.id = subcat.categoriapai');
        $data = [
            'categorias' => $categorias,
            'produto' => $produto
        ];

        return view('Front.ClienteProduto', $data);
    }
    public function PesquisarProd(Request $request)
    {
        $busca = $request->only('buscar');
        $busca = "%" . $busca['buscar'] . "%";
        $produto = cadastroproduto::where('NOME', 'LIKE', $busca)->paginate(4)->withQueryString();
        return view('Front.ClienteProduto', compact('produto'));
    }

    public function contato()
    {
        return view("Front.Contato");
    }

    public function sobre()
    {
        return view("Front.Sobre");
    }
}
