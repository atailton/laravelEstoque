@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 offset-2">
@if(old('nome'))
<div class="alert alert-success" role="alert">
        Produto <strong>{{ old('nome') }}</strong> adicionado com sucesso!
</div>
@endif
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<div class="card">
    
    <div class="card-header">
        <div class="row">
            <div class="col-md-12">
                <h3 class="float-left">Listagem</h3>
                <a href="/produtos/novo"><i style="font-size: 16pt;" class="fa fa-plus float-right"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            @foreach ($produtos as $p)
            <tr class="{{ $p->quantidade <= 1 ? 'bg-danger text-white' : ''}}" >
                <td><?= $p->nome ?></td>
                <td><?= $p->valor ?></td>
                <td><?= $p->descricao ?></td>
                <td><?= $p->quantidade ?></td>
                <td> 
                    <a href="/produtos/mostra/<?= $p->id ?>"><i class="fa fa-search"></i></a>
                </td>
                
                <td> 
                    <a href="/produtos/editar/<?= $p->id ?>"><i class="fa fa-edit text-success"></i></a>
                </td>
                <td> 
                    <a href="/produtos/remove/<?= $p->id ?>"><i class="fa fa-trash-o text-danger"></i></a>
                </td>
            </tr>
            @endforeach
        </table>

    </div>
</div>
@if ($p->quantidade <= 1)
<br/><h4>
    <span class="badge badge-danger float-right">
        Um ou menos itens no estoque
    </span>
</h4>
</div>
</div>
@endif
@stop