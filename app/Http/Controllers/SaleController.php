<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function inicio(){
        return view('forms.venda');
    }

    public function novaVendaForm(Request $req){
        $produto = $req->produto_venda;
        $fornecedor = $req->fornecedor;

        var_dump($fornecedor);
        die;
        return view('forms.venda');
    }
}
