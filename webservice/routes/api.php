<?php

// use Illuminate\Routing\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Conteudo;
use App\User;

Route::post("/cadastro", "UsuarioController@cadastro");
Route::post("/login", "UsuarioController@login");
Route::middleware('auth:api')->get('/usuario', "UsuarioController@usuario");
Route::middleware('auth:api')->put('/perfil', "UsuarioController@perfil");

Route::get('/testes', function(){

    $user = User::find(1);
    $user2 = User::find(2);

    // $user->conteudos()->create([
    //     'titulo' => 'Conteudo3',
    //     'texto' => 'Aqui o texto',
    //     'imagem' => 'Url da imagem',
    //     'link' => 'Link',
    //     'data' => '2023-11-11',
    // ]);
    // return $user->conteudos;

    //add amigos
    // $user->amigos()->attach($user2->id);    
    // $user->amigos()->detach($user2->id);    
    // $user->amigos()->toggle($user2->id);    
    // return $user->amigos;

    //add curtidas
    // $conteudo = Conteudo::find(1);
    // $user->curtidas()->toggle($conteudo->id);

    // // return $conteudo->curtidas->count();
    // return $conteudo->curtidas;

    //add comentarios
    //  $conteudo = Conteudo::find(1);

    //  $user->comentarios()->create([
    //     'conteudo_id' => $conteudo->id,
    //     'texto' => 'Show de bola',
    //     'data' => date('Y-m-d') 
    // ]);

    // $user2->comentarios()->create([
    //     'conteudo_id' => $conteudo->id,
    //     'texto' => 'Não gostei',
    //     'data' => date('Y-m-d')
    // ]);
    // return $conteudo->comentarios;

});
