<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastroproduto;
use App\Models\pedido;

class ClienteController extends Controller
{
    public function ClienteProduto()
    {
        $produto = cadastroproduto::all();
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
        return view("Front.contato");
    }
}
