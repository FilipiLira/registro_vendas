<?php

namespace App\Http\Services;

class SaleRepository
{ 
   public function todasVendas(){
         $vendas = \App\Sale::join('products', 'sales.product_id', 'products.id')
                              ->join('sales_providers', 'sales.id', 'sales_providers.sale_id')
                              ->join('delivery_adresses', 'sales.delivery_id', 'delivery_adresses.id')
                              ->select('products.*', 'sales.sale_date', 'delivery_adresses.*' )->distinct()->get();
        
         $vendasArray = [];
         $arrayTemp = [];
         foreach ($vendas as $venda) {
             
            $fornecedoresVenda = \App\Provider::join('sales_providers', 'sales_providers.provider_id', 'providers.id')
                                             ->select('providers.name')
                                             ->where('sales_providers.sale_id', $venda->id)->get();
            
            
            $arrayTemp['venda'] = $venda;
            $arrayTemp['fornecedores'] = $fornecedoresVenda;

            array_push($vendasArray, $arrayTemp);
         }
        
         return $vendasArray;
   }  
}
