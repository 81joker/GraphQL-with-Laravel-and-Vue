<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    $response = Http::post('http://localhost/graphql',[
        'query' => '
            query {
                posts {
                    data {
                    id
                    title
                }
            }
        }
        '
    ]);

    return view('app', [
        'posts' => $response->json()['data']['posts']['data'],
    ]);
});


Route::get('/create', function () {
    $response = Http::post('http://localhost/graphql', [
        'query' => '
            mutation {
                createPostResolver(user_id: 1, title: "Hello from Laravel", body: "Laravel") {
                    id
                    title
                }
            }
        '
    ]);

    return $response->json();
});