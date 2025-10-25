<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

Route::get('/', [HomeController::class, 'index']);

Route::get('/produtos', [ProdutoController::class, 'index']);

Route::get('/produtos/{id}', [ProdutoController::class, 'show']);

Route::get('/sobre', [UserController::class, 'sobre']);

Route::get("/login", [UserController::class, 'login']);


Route::get("/admin/login", [AdminController::class, 'login']);

Route::get("/admin/dashboard", [AdminController::class, 'dashboard']);

Route::get("/admin/clientes", [AdminController::class, 'clientes']);

Route::get("/admin/clientes/{id?}", [AdminController::class, 'show_cliente']);

Route::get("/admin/fornecedores", [AdminController::class, 'fornecedores']);

Route::get("/admin/produtos", [AdminController::class, 'produtos']);

Route::get("/admin/produtos/{slug}", [AdminController::class, 'find_product'])
    ->where('slug', '[A-Za-z0-9\-]+');

Route::get("/cadastro", [UserController::class, 'cadastro']);

Route::get('/admin/produtos/create', [AdminController::class, 'createProduto'])->name('produtos.create');

Route::post('/admin/produtos', [AdminController::class, 'storeProduto'])->name('produtos.store');


