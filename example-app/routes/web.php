<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function (){
    return view('teste');
});

/* 
        A função 'view' é uma função do laravel que acessa a pasta 'views'
    e acessa os arquivos 'blade'
        O blade é uma forma diferente (mais simples) de escrever html + php
    e é um estudo a parte. Uma das formas de desenvolver frontend com laravel
*/