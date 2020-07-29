<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function pesquisarProduto($inputPesquisa){
         
        $produtos = \App\Produto::where('nome', 'LIKE', '%'.$inputPesquisa.'%')->get();

        return json_decode($produtos);

        // return \App\Produto::create([
        //     'nome' => 'produto',
        //     'referencia' =>  '11212',
        //     'preco' => 5.3
        // ]);

    }
}
