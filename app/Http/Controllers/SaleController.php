<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function inicio(){
        return view('forms.venda');
    }

    public function novaVendaForm(Request $req){
        $produtoReq = $req->produto_venda;
        $fornecedorReq = $req->fornecedor;

        $produto = \App\Product::find($produtoReq);
        $fornecedor = \App\Provider::find($fornecedorReq);

        
        return view('forms.venda', compact('produto', 'fornecedor'));
    }
}
