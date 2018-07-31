@extends('layouts.app')

@section('content')

@if ($usuario)
<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">

                <div class="row">
                    <div class="col-md-12">
                        <p class="float-left">Detalhes do usuário: <strong> {{ $usuario->name }} </strong></p>
                        <a href="{{action('UsuarioController@listagem')}}"><i style="font-size: 16pt;" class="fa fa-sign-out float-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">

                <table class="table table-hover">
                    <tr>
                        <td>
                            <b>Nome:</b> {{ $usuario->name }}
                        </td>
                        <td>
                            <b>E-mail:</b> {{ $usuario->email }} 
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