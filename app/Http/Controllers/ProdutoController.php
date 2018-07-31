<?php

namespace estoque\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use estoque\Produto;
use Request;
use estoque\Http\Requests\ProdutosRequest;

class ProdutoController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public function __construct() {
        
        $this->middleware('auth', ['only' =>
            ['listagem',
                'adiciona',
                'remove',
                'mostra',
                'listaJson',
                'editar',
                'atualiza',
                'novo'
            ]
        ]);
        
        //$this->middleware('auth'); para todo mundo

    }

    public function listagem() {

        //$produtos = DB::select('select * from produtos');
        //$produtos =  json_decode(json_encode($produtos), true); 

        $produtos = Produto::all();

        $data['produtos'] = $produtos;
        return view('produtos.listagem', $data);
        //return view()->file('/produtos/listagem.blade', $data);
    }

    public function mostra($id) {

        //$id = Request::input('id', '0'); //se for por get na url
        //$id =  Request::route('id'); //se colocar parâmetro na rota ou usa estilo codeigniter
        //$produto = DB::select('select * from produtos where id = ?', [$id]);
        $produto = Produto::find($id);

        if (empty($produto)) {
            $produto = false;
            //$produto[0] = false;
        }

        //$data['produto'] = $produto[0];
        $data['produto'] = $produto;
        return view('produtos.mostra', $data);
    }

    public function adiciona(ProdutosRequest $request) {

        //$nome = Request::input('nome');
        //$descricao = Request::input('descricao');
        //$valor = Request::input('valor');
        //$quantidade = Request::input('quantidade');

        /* DB::insert('insert into produtos 
          (nome, valor, descricao, quantidade) values (?,?,?,?)', array($nome, $valor, $descricao, $quantidade)); */

        /* DB::table('produtos')->insert(
          ['nome' => $nome,
          'valor' => $valor,
          'descricao' => $descricao,
          'quantidade' => $quantidade
          ]
          ); */

        /*
          $produto = new Produto(); // cria um objeto
          $produto->nome = Request::input('nome');
          $produto->valor = Request::input('valor');
          $produto->descricao = Request::input('descricao');
          $produto->quantidade = Request::input('quantidade');

          $produto->save();&/

          //ou

          /* $params = Request::all();
          $produto = new Produto($params);
          $produto->save(); */

        //ou
        //Produto::create(Request::all());
        //com uso da validação
        Produto::create($request->all());

        return redirect()->action('ProdutoController@listagem')->withInput(); //o helpper withinput envia os inputos para o redirect
        //ou pode colocar Request::only('nome') dentro do withInput para passar apenas o nome
        //pode dizer qual dado não deve ser passado Request::except('senha')
        //pode se passar o caminho dentro do redirect ou o controlador/método de destino usando o action
        //redirect('produtos') ou redirect()->action('ProdutoController@listagem')
    }

    public function novo() {
        return view('produtos.novo');
    }

    public function listaJson() {
        //$produtos = DB::select('select * from produtos');
        $produtos = Produto::all();

        //return $produtos; //por padrão retorna json mas pode colocar explícito
        return response()->json($produtos);
        //return response()->download($caminhoParaUmArquivo); para download de um arquivo
    }

    public function remove($id) {
        $produto = Produto::find($id);
        $produto->delete();

        return redirect()->action('ProdutoController@listagem')->with('status', 'Produto Removido');
    }

    public function editar($id) {

        $produto = Produto::find($id);
        $data['produto'] = $produto;


        return view('produtos.editar', $data);
    }

    public function atualiza($id) {

        $produto = Produto::find($id);

        $produto->nome = Request::input('nome');
        $produto->valor = Request::input('valor');
        $produto->descricao = Request::input('descricao');
        $produto->quantidade = Request::input('quantidade');

        $produto->save();

        return redirect()->action('ProdutoController@listagem')->with('status', 'Protudo atualizado');
    }

}
