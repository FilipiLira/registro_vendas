<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Http\Services\SaleRepository;


class SaleController extends Controller
{
    public function inicio(){

        $saleR = new SaleRepository;
        $vendas = $saleR->todasVendas();

        $total = 0;
        foreach ($vendas as $value) {
            $total = $total + $value['venda']->price;
        }

        return view('forms.venda', compact('vendas', 'total'));
    }

    public function novaVendaForm(Request $req){
        $produtoReq = $req->produto_venda;
        $fornecedorReq = $req->fornecedor;

        $produto = \App\Product::find($produtoReq);
        $fornecedor = \App\Provider::find($fornecedorReq);
        $saleR = new SaleRepository;
        $vendas = $saleR->todasVendas();

        $total = 0;
        
        foreach ($vendas as $value) {
            $total = $total + $value['venda']->price;
        }
        
        return view('forms.venda', compact('produto', 'fornecedor', 'vendas', 'total'));
    }

    public function cadastroVenda(Request $req, SaleRepository $saleR){
        
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

        $fornecedorArray = json_decode($req->fornecedor);

        // var_dump($fornecedor[0]->id);
        // die;

        foreach ($fornecedorArray as $fornecedor) {
            // var_dump($fornecedor);
            // die;
            \App\SalesProvider::create([
                'provider_id' => $fornecedor->id,
                'sale_id' => $venda->id
            ]);
        
        }

        $saleR = new SaleRepository;
        $vendas = $saleR->todasVendas();

        
        return $vendas;
    }
}
