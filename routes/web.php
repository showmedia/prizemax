<?php



use Illuminate\Support\Facades\Route;



use App\Http\Controllers\CotaController;

use App\Http\Controllers\PremioController;

use App\Http\Controllers\SorteioController;

use App\Http\Controllers\VendaController;

use App\Http\Controllers\ContatoController;

use App\Http\Controllers\SorteiarController;

use App\Models\Sorteio;

use App\Http\Controllers\NotaController;

use App\Http\Controllers\IndicadoController;

use App\Http\Controllers\SaqueController;

use App\Models\User;



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



Route::get('/notas', [NotaController::class, 'list'])->middleware('auth');

Route::get('/nota', [NotaController::class, 'create'])->middleware('auth');

Route::post('/nota', [NotaController::class, 'store'])->middleware('auth');

Route::get('/nota/{id}', [NotaController::class, 'show'])->middleware('auth');

Route::post('/nota/numero/{id}', [NotaController::class, 'add'])->middleware('auth');

Route::delete('/nota/{id}', [NotaController::class, 'delete'])->middleware('auth');

Route::delete('/nota/numero/{id}', [NotaController::class, 'remove'])->middleware('auth');

Route::delete('/notes/deletar', [NotaController::class, 'limpar'])->middleware('auth');



Route::get('/sorteio/vencedor/{id}', [SorteiarController::class, 'show'])->middleware('auth');

Route::get('/sorteio/pesquisar', [SorteiarController::class, 'pesquisar'])->middleware('auth');

Route::put('/sorteio/vencedor/save', [SorteiarController::class, 'save'])->middleware('auth');



/*rotas users*/ 

Route::post('/sorteio/comprar/{id}', [VendaController::class, 'preparar'])->middleware('auth');

Route::get('/venda/confirmar/{id}', [VendaController::class, 'confirmar'])->middleware('auth');

Route::get('/venda/show/{id}', [VendaController::class, 'showVenda'])->middleware('auth');

Route::get('/ganhadores', [SorteioController::class, 'ganhadores']);

Route::get('/parceiros', function(){

    return view('parceiros');

});

Route::delete('/compras/deletar/{id}', [VendaController::class, 'limparcompras'])->middleware('auth');

Route::get('/indicados', [IndicadoController::class, 'listar'])->middleware('auth');


Route::get('/contato', [ContatoController::class, 'show']);

Route::post('/contato', [ContatoController::class, 'send']);

Route::post('/saque', [SaqueController::class, 'solicitar'])->middleware('auth');
Route::put('/saque/{id}', [SaqueController::class, 'pagar'])->middleware('auth');

Route::get('/vendedores', [IndicadoController::class, 'vendedores'])->middleware('auth');

Route::get('/termos', function(){

    return view('termos');

});

Route::get('/register', function(){
   
    return view('auth.register');
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

