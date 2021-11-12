<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastroproduto;
use App\Models\pedido;

class ClienteController extends Controller
{
    public function ClienteProduto()
    {
        $produto = cadastroproduto::paginate(6)->withQueryString();
        // dd($produto);
        return view('Front.ClienteProduto', compact('produto'));
    }

    public function SubPagina($id, Request $request)
    {
        $peca = cadastroproduto::select("*")->where([["id", "=", $id]])->get();
        return view('Front.ClientePeca', compact('peca'));
    }
    public function contato()
    {
        return view("Front.Contato");
    }
    public function PesquisarProd(Request $request)
    {
        $data = $request->only('buscar');
        $produto = cadastroproduto::where('CODIGO', $data['buscar'])->paginate(4)->withQueryString();
        return view('Front.ClienteProduto', compact('produto'));
    }

    public function sobre()
    {
        return view("Front.Sobre");
    }
}
