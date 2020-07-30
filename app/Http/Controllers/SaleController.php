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

    public function cadastroVenda(Request $req){
        
        $endereco = \App\DeliveryAdresse::create([
            'uf' => $req->uf,
            'city' => $req->cidade,
            'neighborhood' => $req->bairro,
            'street' => $req->rua,
            'number' => $req->numero,
            'postal_code' => $req->cep
        ]);

        $venda = \App\Sale::create([
            'product_id' => $req->produto,
            'delivery_id' => $endereco->id,
            'sale_date' => $req->data
        ]);

        var_dump($req->fornecedor);
        die;

        foreach ($req->fornecedor as $fornecedor) {
            \App\SalesProvider::create([
                'provider_id' => $fornecedor,
                'sale_id' => $venda->id
            ]);
        
        }

        return 'cadastrou';
    }
}
