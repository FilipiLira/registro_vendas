@extends('layout.app')

@section('content')

    {{-- @if (isset($produtos)) --}}
        <div class="container">
            <h3 class="pt-4">Nova venda</h3>
            <form action="" style="padding: 50px" class="row">
                <div class="form-group col-12 col-lg-10">
                    <input class="form-control" type="text" id="pesquisa_produto" typeInput='produto' url=" {{ route('produto.pesquisa', 'atri') }} " name="pesquisa_produto" placeholder="Pesquisar produto">
                    <input type="hidden" id="produto_venda" name="produto_venda">
                    <div id="pesquisa_produto" class="conteudo_pesquisa">
                           
                    </div>
                </div>
            </form>
        </div>

        <div class="container" style="padding: 70px">
     
                    
                        <label for="my-input">Produto</label>
                        <select multiple>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                  
            </div>
        </div>
        
    {{-- @else
        
       

    @endif --}}
@endsection