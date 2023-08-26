<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CotaController;
use App\Http\Controllers\PremioController;
use App\Http\Controllers\SorteioController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\ContatoController;
use App\Models\Sorteio;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [SorteioController::class, 'welcome']);
Route::get('/sorteio', [SorteioController::class, 'create'])->middleware('auth');
Route::post('/sorteio', [SorteioController::class, 'store'])->middleware('auth');
Route::get('/sorteio/show/{id}', [SorteioController::class, 'show'])->middleware('auth');
Route::get('/sorteio/edit/{id}', [SorteioController::class, 'edit'])->middleware('auth');
Route::put('/sorteio/edit/{id}', [SorteioController::class, 'update'])->middleware('auth');
Route::get('/sorteio/favorito/{id}', [SorteioController::class, 'favorito'])->middleware('auth');
Route::get('/vendas/{all}', [VendaController::class, 'listVendas'])->middleware('auth');
Route::post('/venda/status/{id}', [VendaController::class, 'pagou'])->middleware('auth');
Route::delete('/venda/delete/{id}', [VendaController::class, 'destroy'])->middleware('auth');

Route::get('/user/sorteio/show/{id}', [SorteioController::class, 'userShow']);
Route::get('/meusnumeros', [SorteioController::class, 'meusnumeros'])->middleware('auth');


Route::get('/produto/{id}', [PremioController::class, 'create'])->middleware('auth');
Route::post('/produto/{id}', [PremioController::class, 'store'])->middleware('auth');
Route::get('/premio/edit/{id}', [PremioController::class, 'edit'])->middleware('auth');
Route::put('/premio/edit/{id}', [PremioController::class, 'update'])->middleware('auth');

/*rotas users*/ 
Route::post('/sorteio/comprar/{id}', [VendaController::class, 'preparar']);
Route::get('/venda/confirmar', [VendaController::class, 'confirmar'])->middleware('auth');
Route::get('/venda/show/{id}', [VendaController::class, 'showVenda'])->middleware('auth');
Route::get('/ganhadores', [SorteioController::class, 'ganhadores']);
Route::get('/parceiros', function(){
    return view('parceiros');
});


Route::get('/contato', [ContatoController::class, 'show']);
Route::post('/contato', [ContatoController::class, 'send']);
Route::get('/termos', function(){
    return view('termos');
});

Route::post('/process_payment', [VendaController::class, 'teste']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $sorteios = Sorteio::orderBy('id','DESC')->get();
        if(Auth::user()->nivel == 1){
            return view('dashboard', ['sorteios' => $sorteios]);
        }{
            return view('welcome', ['sorteios' => $sorteios]);
        }
        
    })->name('dashboard');
});
