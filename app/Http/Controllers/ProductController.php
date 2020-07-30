<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function pesquisarProduto($inputPesquisa){

         if(!is_numeric($inputPesquisa)){
            $produtos = \App\Product::where('name', 'LIKE', '%'.$inputPesquisa.'%')->get();
         } else {
            $produtos = \App\Product::where('reference', 'LIKE', '%'.$inputPesquisa.'%')->get();
         }

        return json_decode($produtos);

    }
}
