@extends('layout.app')

@section('content')
    <div class="container">
        <h3 class="pt-4">Nova venda</h3>
        <form action="" style="padding: 50px" class="row">
            <div class="form-group col-12 col-lg-10">
                <input id="my-input" class="form-control" type="text" name="" placeholder="Pesquisar produto">
            </div>
            <div class="col-12 col-lg-2">
                <button class="btn btn-success"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
        </form>
    </div>
@endsection