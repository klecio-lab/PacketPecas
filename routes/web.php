<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers;
use App\Models\pedido;
use App\Models\cadastroproduto;

Route::get('/', function () {
    return view('Front.ClienteIndex');
})->name('ClienteHome');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $QuantidadePedidos = pedido::select('nomeCliente')->groupBy('nomeCliente')->distinct()->get();
    $QuantidadePedidos = count($QuantidadePedidos);
    $QuantidadeProdutos = cadastroproduto::select('*')->count();
    // dd($QuantidadePedidos);
    return view('dashboard', compact('QuantidadePedidos', 'QuantidadeProdutos'));
})->name('dashboard');

//Parte Frond End Cliente
Route::get('ClienteProduto', [ClienteController::class, 'ClienteProduto'])->name('ClienteProduto');
Route::get('ClienteProduto/{id}', [ClienteController::class, 'SubPagina'])->name('Subpagina');
Route::get('contato', [ClienteController::class, 'contato'])->name('contato');


//Rota de vizualização e adição de produtos
Route::get('Adicionar', [ProdutoController::class, 'Adicionar'])->name('AddProd');
Route::post('Adicionar', [ProdutoController::class, 'produtoUpdate' ])->name('products.update');

//Visualização de Produtos
Route::get('produto', [ProdutoController::class, 'produto'])->name('Products');

//pesquisar
Route::post('produto',  [ProdutoController::class, 'pesquisar'])->name('product.search');

//geral pedido
Route::get('geral',  [ProdutoController::class, 'Geral'])->name('Geral');

//pedidos
Route::get('pedidos',  [ProdutoController::class, 'pedir'])->name('Pedidos');
Route::any('pedidos/situacao',  [ProdutoController::class, 'pedido'])->name('Finalizar');
Route::get('geral/{nome}',  [ProdutoController::class, 'EditarGeral'])->name('editPedidoGeral');
Route::post('pedidos/teste',  [ProdutoController::class, 'AddProduct'])->name('Addpedido');
Route::post('pedidos',  [ProdutoController::class, 'atualizarPedido'])->name('atualizar');
//deletando dados produto no pedido
Route::get('pedidos/{id}',  [ProdutoController::class, 'excluirProdLista'])->name('excluirProd');

//editar dados
Route::get('editar/{id}',  [ProdutoController::class, 'editar'])->name('editarProducts');
Route::post('editar',  [ProdutoController::class, 'editarReg'])->name('editarRegName');

//deletando dados
Route::get('produto/{id}',  [ProdutoController::class, 'excluir'])->name('excluir');
Route::get('produto/situcao/{id}',  [ProdutoController::class, 'ExcluirSituacao'])->name('ExcluirSituacao');
Route::get('geral/excluir/{id}',  [ProdutoController::class, 'GeralExcluir'])->name('GeralExcluir');

