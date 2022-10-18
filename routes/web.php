<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');

Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato');

Route::get('/sobre',[\App\Http\Controllers\SobreController::class,'sobre'])->name('site.sobre');

Route::get('/login', function(){ return 'login';})->name('site.login');

//Agrupamento app serve para agrupar rotas
//names aplicados a rotas podem ser utilizados apenas dentro da lógica. Sendo apenas o nome(apelido)
Route::prefix('/app')->group(function() {
    Route::get('/fornecedores',[App\Http\Controllers\FornecedorController::class,'fornecedores'])->name('app.fornecedores');
    Route::get('/clientes', function(){ return 'clientes';})->name('app.clientes');
    Route::get('/produtos', function(){ return 'produtos';})->name('app.produtos');
});

//Rotas de Fallback - Para evitar receber erro 404
Route::fallback(function() {
    echo 'A rota foi de base. <a href="'.route('site.index').'">clique aqui<a/> para voltar ao inicio';

});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class,'teste'])->name('site.teste');
//Redireciona uma rota para outra.
//Route::redirect('/rota2','/rota1');
/*Route::get('/rota1', function() {
    echo 'Rota 1';
})->name('site.rota1');
/*
Route::get('/rota2', function() {
    return redirect()->route('site.rota1');
})->name('site.rota2');*/



//nome, categoria, assunto, mensagem 

/*Route::get('/contato/{nome}/{categoria_id}', 
function(string $nome, 
int $categoria_id = 1 //1 - informação 
) {
    echo "estamos aqui: .$nome - $categoria_id";
}

)->where('categoria_id','[0-9]+')->where('nome','[A-Za-a]+');*/