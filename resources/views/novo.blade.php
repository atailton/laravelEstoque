@extends('principal')

@section('conteudo')

<br/><br/>
<div class="card">
    <div class="card-header">

        <div class="col-md-12">
            <h3 class="float-left">Novo Produto</h3>              
            <a href="/produtos"><i style="font-size: 16pt;" class="fa fa-sign-out float-right"></i></a>
        </div>
    </div>
    <div class="card-body">
        <form name="novo" action="/produtos/adiciona" method="post">
            <div class="form-group">
                <label for="nome">Nome</label>
                <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome do produto">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input name="descricao" type="text" class="form-control" id="descricao" placeholder="Descrição do produto">
            </div>
            <div class="form-group">
                <label for="valor">Valor</label>
                <input name="valor" type="number" class="form-control" id="valor" placeholder="Valor do produto">
            </div>
            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input name="quantidade" type="number" class="form-control" id="quantidade" placeholder="Quantidade do produto">
            </div>
            <div class="form-group">
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <button type="submit" class="btn btn-primary float-right">Salvar</button>
            </div>
        </form>       
    </div>
</div>

@stop