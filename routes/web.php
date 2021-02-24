<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você pode registrar as rotas da web para seu aplicativo. Esses
| as rotas são carregadas pelo RouteServiceProvider dentro de um grupo que
| contém o grupo de middleware "web". Agora crie algo ótimo!
|
*/

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');
/**Cria-se uma agrupamento de rotas */
Route::middleware('autenticacao:padrao,visitante')
    ->prefix('/app')->group(function () {
        Route::get('/home', 'HomeController@index')->name('app.home');
        Route::get('/sair', 'LoginController@sair')->name('app.sair');
        Route::get('/cliente', 'ClienteController@index')->name('app.cliente');
        Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
        Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
        Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
        Route::get('/fornecedor/editar/{id}', 'FornecedorController@editar')->name('app.fornecedor.editar');
        Route::get('/produto', 'ProdutoController@index')->name('app.produto');
    });

/**Cria-se um direcionamento de rota 

Route::get('/rota1', function () {
    echo 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function () {
   return redirect()-> route('site.rota1');
})->name('site.rota2');
 */
Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

/**Cria-se uma rota de fallbak, página não encontrada */
Route::fallback(function () {

    echo 'A rota acessada não existe, <a href="' . route('site.index') . '"' . ">Clique aqui</a> Para retornar para página principal.";
});
