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
Route::get('/carrinho/acessar/{id}', [ProdutoController::class, 'viewCarrinho'])->name("carrinho-compras");
Route::post('/carrinho/comprar/{id}', [ProdutoController::class, 'updateCarrinho'])->name("update-carrinho");
Route::post('/store', [ProdutoController::class, 'store'])->name("create-product");
Route::post('/store/delete', [ProdutoController::class, 'deleteProduct'])->name("delete-product");
