@extends('layouts.app')

@section('content')
<div class="">
    <div class="col-md-12">
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
                        <a href="/usuarios/novo"><i style="font-size: 16pt;" class="fa fa-plus float-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    @foreach ($usuarios as $p)
                    <tr class="" >
                        <td><?= $p->name ?></td>
                        <td><?= $p->email ?></td>
                        <td> 
                            <a href="/usuarios/mostra/<?= $p->id ?>"><i class="fa fa-search"></i></a>
                        </td>

                        <td> 
                            <a href="/usuarios/editar/<?= $p->id ?>"><i class="fa fa-edit text-success"></i></a>
                        </td>
                        <td> 
                            <a href="/usuarios/remove/<?= $p->id ?>"><i class="fa fa-trash-o text-danger"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </table>

            </div>
        </div>
    </div>
</div>
@stop