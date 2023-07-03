<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ProdutoController::class, 'index'])->name('listagem-produtos');
Route::get('/carrinho/{id}', [ProdutoController::class, 'visualizarCarrinho'])->name("carrinho-compras");
Route::post('/store', [ProdutoController::class, 'store'])->name("create-product");
Route::post('/store/destroy', [ProdutoController::class, 'destroy'])->name("delete-product");
