<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function pesquisarProduto($inputPesquisa){
         
        $produtos = \App\Product::where('name', 'LIKE', '%'.$inputPesquisa.'%')->get();

        return json_decode($produtos);

        // return \App\Product::create([
        //     'name' => 'Caneta Bic',
        //     'reference' =>  '11232',
        //     'price' => 5.3
        // ]);

    }
}
