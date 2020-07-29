<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProviderController extends Controller
{
    function fornecedoresTodos(){
        $fornecedores = \App\Fornecedor::all();

        return 'ss';
    }
}
