@extends('layout.app')

@section('content')

    
    <div class="container">
        @if (!isset($produto))
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
            
        @else
         
            <form id="ss" action="{{ route('vendas.cadastro') }}" method="post" style="padding: 50px 70px">
                 @csrf
                 <h4 class="title">Dados do produto</h4>
                 <hr/>
                 <div class="row">
                     <div class="form-group col-lg-6">
                         <label for="my-input">Produto</label>
                         <p>{{$produto->name}}</p>
                         <input id="produto" type="hidden" name="produto" value="{{$produto->id}}">
                         <input id="fornecedor" type="hidden" name="fornecedor" value="{{$fornecedor}}">
                      </div>
                      <div class="form-group col-lg-6">
                          <label for="data">Data da venda</label>
                          <input id="data" class="form-control" type="date" name="data" value="{{$produto->name}}">
                      </div>
                 </div>
                 <h4 class="title">Endereço de entrega</h4>
                 <hr/>
                 <div class="row">
                    <div class="form-group col-lg-3">
                        <label for="cep">CEP</label>
                        <input id="cep" class="form-control" type="text" name="cep" required>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="uf">UF</label>
                        <input id="uf" class="form-control" type="text" name="uf" required>
                    </div>
                    <div class="form-group col-lg-7">
                        <label for="cidade">Cidade</label>
                        <input id="cidade" class="form-control" type="text" name="cidade" required>
                    </div>
                 </div>
                 <div class="row">
                    <div class="form-group col-lg-5">
                        <label for="bairro">Bairro</label>
                        <input id="bairro" class="form-control" type="text" name="bairro" required>
                    </div>
                    <div class="form-group col-lg-5">
                        <label for="rua">Rua</label>
                        <input id="rua" class="form-control" type="text" name="rua" required>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="numero">Numero</label>
                        <input id="numero" class="form-control" type="text" name="numero" required>
                    </div>
                 </div>
                 <button id="cadastrar" class="btn btn-success mb-3">Cadastrar</button>
            </form>
        
        @endif

            <table class="table table-dark">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Fornecedor(es)</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="bodyTabela">

                   @if (isset($vendas))
                       @foreach ($vendas as $venda)
                        
                            <tr scope="row" idTr="{{$venda['venda']->id}}" class="linhas-tabela">
                                <td>{{$venda['venda']->id}}</td>
                                <td>{{$venda['venda']->name}}</td>
                                <td>R${{$venda['venda']->price}},00</td>
                                <td>
                                @foreach ($venda['fornecedores'] as $key => $item)
                                    @if (!$key == count($venda['fornecedores']) && count($venda['fornecedores']) > 1 )
                                       {{$item->name}} <span>|</span>
                                    @else
                                       {{$item->name}}
                                    @endif
                                @endforeach
                                </td>
                                <td>
                                    <button idBtn="{{$venda['venda']->id}}" class="btn btn-primary modal-btn" data-toggle="modal" data-target="modal"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </td>
                                <input type="hidden" name="" value="{{$venda['venda']->postal_code}}">
                                <input type="hidden" name="" value="{{$venda['venda']->city}}">
                                <input type="hidden" name="" value="{{$venda['venda']->neighborhood}}">
                                <input type="hidden" name="" value="{{$venda['venda']->uf}}">
                                <input type="hidden" name="" value="{{$venda['venda']->street}}">
                                <input type="hidden" name="" value="{{$venda['venda']->reference}}">
                            </tr>
                          
                       @endforeach
                   @endif
                </tbody>
                <tfoot>
                    <tr scope="row" colspan="3">
                        <td>Total: R${{$total}},00</td>
                    </tr>
                </tfoot>
            </table>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Launch demo modal
              </button>
              
              <!-- Modal -->
              <div class="custon-modal" id="modal" >
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Dados da venda</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      
                    </div>
                  </div>
                </div>
              </div>
       </div>
    </div>
@endsection