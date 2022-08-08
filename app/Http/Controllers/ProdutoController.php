<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cadastroproduto;
use App\Models\pedido;
use App\Models\categorias;
use App\Models\subcategorias;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function __construct(categorias  $categorias, subcategorias $subcategorias )
    {
        $this->categorias = $categorias;
        $this->subcategorias = $subcategorias;
    }

    public function Adicionar()
    {
        $codigos = cadastroproduto::all();
        $categoria = $this->categorias->orderBy('categoria','ASC')->get();
        $subcategoria = $this->subcategorias->where('id', '=' , 0)->orderBy('subcategoria', 'ASC')->get();
        $subcategoriaFiltro = null;
        $dados = null;
        return view('prod', compact('codigos', 'categoria', 'subcategoria', 'subcategoriaFiltro', 'dados'));
    }
    public function FiltroSubcategoria($dados, Request $request){
        $dados = urldecode($dados);
        $dados = explode('!;', $dados);
        // dd($dados);
        $categoria = DB::select('select * from categorias');
        $categorias = DB::select('select categoria from categorias where id = :id', ["id" => $dados[0]]);
        $categoriaAUX;
        foreach($categorias as $cat){
            $categoriaAUX = $cat->categoria;
        }
        $subcategoriaFiltro = DB::select('select * from subcategorias where categoriaPai = :id', ["id" => $dados[0]]);
        return view('prod', compact('categoria', 'subcategoriaFiltro', 'dados', 'categoriaAUX'));
    }
    public function produtoUpdate(Request $request)
    {

        $data = $request->only('nome', 'descricao', 'imagem', 'preco', 'codigo', 'subcategoria');
        $imagem = $data['imagem'];
        if (empty($request->file('imagem')))
        {
            #salvando as variaveis que vão para o bd
            $passardados->NOME  = $data['nome'];
            $passardados->DESCRICAO = $data['descricao'];
            $passardados->PRECO = $data['preco'];
            $passardados->CODIGO = $data['codigo'];
            $passardados->subcategoria = $data['subcategoria'];
        }else{
            $passardados = New cadastroproduto;
            #salva a imagem na pasta
            $uploadImage = [];
            $cont = 0;
            $nomesImagens = "";
            foreach ($request->file('imagem') as $photos){
                $uploadImage[] = ['photo' => $photos->store('imagem')];
                $nomesImagens =  $uploadImage[$cont]['photo'] . "\," . $nomesImagens;
                $cont = $cont + 1;
            }    

            #salvando as variaveis que vão para o bd
            $passardados->NOME  = $data['nome'];
            $passardados->DESCRICAO = $data['descricao'];
            $passardados->IMAGEM = $nomesImagens;
            $passardados->PRECO = $data['preco'];
            $passardados->CODIGO = $data['codigo'];
            $passardados->subcategoria = $data['subcategoria'];

            $passardados->save();
        }

        return redirect('/produto');
    }

    public function produto()
    {
        $data = cadastroproduto::paginate(9)->withQueryString();
        return view('produto', ['produtover' => $data]);
    }

    public function editar($id, Request $request)
    {
        
        $produtoEdit2 = cadastroproduto::where('id', $id)->get();
        $produtoEditAux;
        foreach($produtoEdit2 as $prodSubc){
            $produtoEditAux = $prodSubc->subcategoria;
        }
        $subcategoriaEspecifica = subcategorias::where('id', $produtoEditAux)->get();
        $subcategoriaEspecificaAUX;
        $subCategoriaName;
        $subCategoriaId;
        foreach($subcategoriaEspecifica as $subc){
            $subcategoriaEspecificaAUX = $subc->categoriaPai;
            $subCategoriaName = $subc->subcategoria;
            $subCategoriaId = $subc->id;
        }
        $categoriaEspecifica = categorias::where('id', $subcategoriaEspecificaAUX)->get();
        $categoriaAUX;
        foreach($categoriaEspecifica as $categoriaAUX){
            $categoriaAUX = $categoriaAUX->categoria;
        }
        $categoria = DB::select('select * from categorias');
        $subcategoria = DB::select('select * from subcategorias');
        $subcategoriaFiltro = null;
        $produtoEdit = cadastroproduto::where('id', $id)->first();
        $data = [
            'valores' => $produtoEdit,
            'categoria' => $categoria,
            'subcategoria' => $subcategoria,
            'subcategoriaFiltro' => $subcategoriaFiltro
        ];
        return view('editar', $data, compact('data', 'categoriaAUX', 'subCategoriaName', 'subCategoriaId'));
    }

    public function editarCategoria($dados, Request $request)
    {
        $dados = urldecode($dados);
        $dados = explode('!;', $dados);
        // dd($dados);
        $categoria = DB::select('select * from categorias');
         $categorias = DB::select('select categoria from categorias where id = :id', ["id" => $dados[0]]);
        $categoriaAUX;
        foreach($categorias as $cat){
            $categoriaAUX = $cat->categoria;
        }
        $subcategoriaFiltro = DB::select('select * from subcategorias where categoriaPai = :id', ["id" => $dados[0]]);
        return view('editar', compact('categoria', 'subcategoriaFiltro', 'dados', 'categoriaAUX'));
    }
    
    public function editarReg(Request $request)
    {
        $data = $request->only('id', 'nome', 'descricao', 'imagem', 'preco', 'codigo', 'subcategoria');
        $id = $data['id'];


        $produtoEdit = cadastroproduto::where('id', $id)->first();

         if (empty($request->file('imagem')))
        {
            
            $produtoEdit->id  = $data['id'];
            $produtoEdit->NOME  = $data['nome'];
            $produtoEdit->DESCRICAO = $data['descricao'];
            $produtoEdit->PRECO = $data['preco'];
            $produtoEdit->CODIGO = $data['codigo'];
            if(!empty($request->subcategoria)){
            $produtoEdit->subcategoria = $data['subcategoria'];
            }

            $produtoEdit->save();
        }
        else
        {
           
             #salva a imagem na pasta
            $uploadImage = [];
            $cont = 0;
            $nomesImagens = "";
            foreach ($request->file('imagem') as $photos){
                $uploadImage[] = ['photo' => $photos->store('imagem')];
                $nomesImagens =  $uploadImage[$cont]['photo'] . "\," . $nomesImagens;
                $cont = $cont + 1;
            }    
            $produtoEdit->id  = $data['id'];
            $produtoEdit->NOME  = $data['nome'];
            $produtoEdit->DESCRICAO = $data['descricao'];
            $produtoEdit->IMAGEM = $nomesImagens;
            $produtoEdit->PRECO = $data['preco'];
            $produtoEdit->CODIGO = $data['codigo'];
            if(!empty($request->subcategoria)){
            $produtoEdit->subcategoria = $data['subcategoria'];
            }

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