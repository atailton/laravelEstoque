@extends('layouts.app')

@section('content')

@if ($produto)
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-12">
                        <p class="float-left">Detalhes do produto: <strong> {{ $produto->nome or 'nenhuma descrição informada'}} </strong></p>
                        <a href="{{action('ProdutoController@listagem')}}"><i style="font-size: 16pt;" class="fa fa-sign-out float-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    <tr>
                        <td>
                            <b>Valor:</b> R$ {{ $produto->valor }}
                        </td>
                        <td>
                            <b>Descrição:</b> {{ $produto->descricao }} 
                        </td>
                        <td>
                            <b>Quantidade em estoque:</b> {{ $produto->quantidade }} 
                        </td>
                    </tr>
                </table>  
            </div>
        </div>
        @else
        <center>
            <h2 style="margin-top: 10%;">Não há dados para mostrar sobre este produto!</h2>
        </center>
    </div>
</div>
@endif

@stop