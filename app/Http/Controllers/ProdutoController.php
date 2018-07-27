<?php

namespace estoque\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Request;

class ProdutoController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function listagem() {

        $produtos = DB::select('select * from produtos');
        //$produtos =  json_decode(json_encode($produtos), true);     

        $data['produtos'] = $produtos;
        return view('listagem', $data);
        //view()->file('/caminho/para/sua/view');
    }

    public function mostra($id) {

        //$id = Request::input('id', '0'); //se for por get na url
        //$id =  Request::route('id'); //se colocar parâmetro na rota ou usa estilo codeigniter

        $produto = DB::select('select * from produtos where id = ?', [$id]);

        if (empty($produto)) {
            $produto[0] = false;
        }

        $data['produto'] = $produto[0];
        return view('mostra', $data);
    }

    public function adiciona() {

        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        if ($nome) {
            /*DB::insert('insert into produtos 
        (nome, valor, descricao, quantidade) values (?,?,?,?)', array($nome, $valor, $descricao, $quantidade));*/

            DB::table('produtos')->insert(
                    [   'nome' => $nome,
                        'valor' => $valor,
                        'descricao' => $descricao,
                        'quantidade' => $quantidade
                    ]
            );

            return redirect('produtos')->withInput(); //o helpper withinput envia os inputos para o redirect
            //ou pode colocar Request::only('nome') dentro do withInput para passar apenas o nome
            //pode dizer qual dado não deve ser passado Request::except('senha')
        }

    }
    
    public function novo(){
        return view('novo');
    }

}
