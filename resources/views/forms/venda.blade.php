@extends('layout.app')

@section('content')

    
        <div class="container">
            <h3 class="pt-4">Nova venda</h3>
            <form id="form-venda" method="post" action="{{ route('vendas.nova') }}" style="padding: 50px">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="text" id="pesquisa_produto" typeInput='produto' url=" {{ route('produto.pesquisa', 'atri') }} " name="pesquisa_produto" placeholder="Pesquisar produto">
                    <input type="hidden" id="produto_venda" name="produto_venda">
                    <div id="pesquisa_produto_container" class="conteudo_pesquisa">
                           
                    </div>
                </div>

                <div class="form-group">
                    <label for="my-input">Selecione o Fornecedor</label>
                    <select id="fornecedor" class="js-example-basic-multiple col-12" name="fornecedor[]" multiple="multiple" required>
                        <option value="opcao1">opcao1</option>
                        <option value="opcao2">opcao2</option>
                        <option value="opcao3">opcao3</option>
                        <option value="opcao4">opcao4</option>
                    </select>
                </div>

                <button id="continuar" class="btn btn-success">Continuar</button>
            </form>
            
            
    
        @if (isset($produtos))
         
           <div class="input-group">
               <input class="form-control" type="text" name="" placeholder="Recipient's text" aria-label="Recipient's " aria-describedby="my-addon">
               <div class="input-group-append">
                   <span class="input-group-text" id="my-addon">Text</span>
               </div>
           </div>
        
        @endif

        <table class="table table-dark">
            <tbody>
                <tr>
                    <td>Produto</td>
                    <td>Preço</td>
                    <td>Fornecedor(es)</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection