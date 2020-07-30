@extends('layout.app')

@section('content')

    
        <div class="container">
            <h3 class="pt-4">Nova venda</h3>
            <form id="form-venda" method="post" action="{{ route('vendas.nova') }}" style="padding: 50px">
                @csrf
                <div class="form-group">
                    <input class="form-control" type="search" id="pesquisa_produto" typeInput='produto' url=" {{ route('produto.pesquisa', 'atri') }} " name="pesquisa_produto" placeholder="Pesquisar produto">
                    <input type="hidden" id="produto_venda" name="produto_venda">
                    <div id="pesquisa_produto_container" class="conteudo_pesquisa">
                           
                    </div>
                </div>

                <div class="form-group">
                    <label for="my-input">Selecione o Fornecedor</label>
                    <select id="fornecedor" class="js-example-basic-multiple col-12" name="fornecedor[]" multiple="multiple" required>
            
                    </select>
                </div>

                <button id="continuar" class="btn btn-success">Continuar</button>
            </form>
            
            
    
        @if (isset($produto))
         
            <form style="padding: 0px 70px">
                 <div class="row">
                     <div class="form-group col-lg-6">
                         <label for="my-input">Produto</label>
                         <input id="my-input" class="form-control" type="text" name="produto_venda" value="{{$produto->name}}">
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="my-input">Data da venda</label>
                          <input id="my-input" class="form-control" type="date" name="produto_venda" value="{{$produto->name}}">
                      </div>
                 </div>
                 <h4 class="title">Endereço de entrega</h4>
                 <hr/>
                 <div class="row">
                    <div class="form-group col-3">
                        <label for="cep">CEP</label>
                        <input id="cep" class="form-control" type="text" name="cep">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="uf">UF</label>
                        <input id="uf" class="form-control" type="text" name="uf">
                    </div>
                    <div class="form-group col-lg-7">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" class="form-control" type="text" name="cidade">
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group col-lg-5">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" class="form-control" type="text" name="bairro">
                    </div>
                    <div class="form-group col-lg-5">
                        <label for="rua">Rua</label>
                        <input id="rua" class="form-control" type="text" name="rua">
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="numero">Numero</label>
                        <input id="numero" class="form-control" type="text" name="numero">
                    </div>
                 </div>
            </form>
        
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
    </div>
@endsection