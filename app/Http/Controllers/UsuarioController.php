<?php

namespace estoque\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use estoque\Usuario;

class UsuarioController extends Controller {

    public function __construct() {

        $this->middleware('auth', ['only' =>
            ['listagem',
                'adiciona',
                'remove',
                'mostra',
                'editar',
                'atualiza',
                'novo'
            ]
        ]);

        //$this->middleware('auth'); para todo mundo
    }

    public function listagem() {
        
        $usuarios = Usuario::all();
        $data['usuarios'] = $usuarios;
        
        return view('usuarios.listagem', $data);
    }
    
    public function mostra($id) {
        
        $usuario = Usuario::find($id);

        if (empty($usuario)) {
            $usuario = false;
        }

        $data['usuario'] = $usuario;
        return view('usuarios.mostra', $data);
    }

}
