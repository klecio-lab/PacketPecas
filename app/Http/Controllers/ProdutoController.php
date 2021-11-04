<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastroproduto;
use App\Models\pedido;

class ProdutoController extends Controller
{

    public function Adicionar()
    {
        return view('prod');
    }
    public function produtoUpdate(Request $request)
    {

        $data = $request->only('nome', 'descricao', 'imagem', 'preco', 'codigo');
        $imagem = $data['imagem'];
        
        if ($imagem->isValid())
        {
            $passardados = New cadastroproduto;
            #salva a imagem na pasta
            $imagemPath = $imagem->store('imagem');

            #salvando as variaveis que vão para o bd
            $passardados->NOME  = $data['nome'];
            $passardados->DESCRICAO = $data['descricao'];
            $passardados->IMAGEM = $imagemPath;
            $passardados->PRECO = $data['preco'];
            $passardados->CODIGO = $data['codigo'];

            $passardados->save();

        }

        return view('prod');
    }

    public function produto()
    {
        $data = cadastroproduto::paginate(9)->withQueryString();
        return view('produto', ['produtover' => $data]);
    }

    public function editar($id, Request $request)
    {
        $produtoEdit = cadastroproduto::where('id', $id)->first();
        return view('editar', ['valores' => $produtoEdit]);
    }
    
    public function editarReg(Request $request)
    {
        $data = $request->only('id', 'nome', 'descricao', 'imagem', 'preco', 'codigo');
        $id = $data['id'];
        // $imagem = $data['imagem'];

        $produtoEdit = cadastroproduto::where('id', $id)->first();

        if (isset($data['imagem']))
        {
            $imagem = $data['imagem'];
            $imagemPath = $imagem->store('imagem');

            $produtoEdit->id  = $data['id'];
            $produtoEdit->NOME  = $data['nome'];
            $produtoEdit->DESCRICAO = $data['descricao'];
            $produtoEdit->IMAGEM = $imagemPath;
            $produtoEdit->PRECO = $data['preco'];
            $produtoEdit->CODIGO = $data['codigo'];

            $produtoEdit->save();
        }
        else
        {
            $produtoEdit->id  = $data['id'];
            $produtoEdit->NOME  = $data['nome'];
            $produtoEdit->DESCRICAO = $data['descricao'];
            $produtoEdit->PRECO = $data['preco'];
            $produtoEdit->CODIGO = $data['codigo'];

            $produtoEdit->save();
        }

        return redirect('/produto');
    }
    public function pesquisar(Request $request)
    {
        $data = $request->only('buscar');
        $busca = cadastroproduto::where('CODIGO', $data['buscar'])->paginate(4)->withQueryString();
        return view('produto', compact('busca'));
    }

    public function Geral()
    {
        $geral = pedido::select('nomeCliente')->groupBy('nomeCliente')->get();
        return view('geral', compact('geral'));
    }

    public function EditarGeral($nome, Request $request)
    {
        $result = pedido::select("*")->where([["nomeCliente", "=", $nome]])->sum('total');
        $situacao = pedido::select("*")->where([["nomeCliente", "=", $nome]])->get();
        return view('situacao', compact('situacao', 'result'));
    }

    public function pedir()
    {
        $codigos = cadastroproduto::all();
        return view('pedido', compact('codigos'));
    }

    public function pedido(Request $request)
    {
        $nome = $request->only('nomeCliente');
        $result = pedido::select("*")->where([["nomeCliente", "=", $nome]])->sum('total');
        $situacao = pedido::select("*")->where([["nomeCliente", "=", $nome]])->get();
        return view('situacao', compact('situacao', 'result'));
        // dd($situacao);
    }

    public function AddProduct(Request $request)
    {
        //carregar informações do cliente
        $data = $request->only('autocomplete', 'preco', 'quantidade');

        $data = $request->only('autocomplete');
        $cliente = $request->only('nomeCliente', 'numero', 'emailCliente', 'autocomplete');
        $busca = cadastroproduto::select("*")->where([["CODIGO", "=", $data]])->get();

        $codigos = cadastroproduto::all();
        $tudo = compact('busca', 'cliente', 'codigos');

        // enviar pedido pra o banco
        $pedidoUp = $request->all();

        $passardados = New pedido;

        $valores = $request->only('preco', 'quantidade');

        $valorTotal =  $valores['preco'] * $valores['quantidade'];
        
        $passardados->nomeCliente  = $pedidoUp['nomeCliente'];
        $passardados->telefone = $pedidoUp['numero'];
        $passardados->email = $pedidoUp['emailCliente'];
        $passardados->codigo = $pedidoUp['autocomplete'];
        $passardados->preco = $pedidoUp['preco'];
        $passardados->quantidade = $pedidoUp['quantidade'];
        $passardados->total =  $valorTotal;

        $passardados->save();


        return view('pedido', $tudo);

    }

    public function atualizarPedido(Request $request)
    {
        $data = $request->only('autocomplete');
        $cliente = $request->only('nomeCliente', 'numero', 'emailCliente', 'autocomplete');
        $busca = cadastroproduto::select("*")->where([["CODIGO", "=", $data]])->get();

        $codigos = cadastroproduto::all();
        $tudo = compact('busca', 'cliente', 'codigos');
        return view('pedido', $tudo);
        // dd($tudo);
    }

    public function GeralExcluir($nome)
    {
        pedido::select("*")->where([["nomeCliente", "=", $nome]])->delete();
        return redirect('geral');
    }

    public function excluirProdLista($id)
    {
        pedido::findOrFail($id)->delete();
        return redirect('geral');
    }

    public function excluir($id)
    {
        cadastroproduto::findOrFail($id)->delete();
        return redirect('/produto');
    }

}
