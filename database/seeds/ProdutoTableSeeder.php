<?php

class ProdutoTableSeeder extends Seeder {

    public function run() {
        DB::insert('insert into produtos 
      (nome, quantidade, valor, descricao) 
      values (?,?,?,?)', array('Geladeira', 2, 5900.00,
            'Side by Side com gelo na porta'));

        DB::insert('insert into produtos 
      (nome, quantidade, valor, descricao) 
      values (?,?,?,?)', array('Fogão', 5, 950.00,
            'Painel automático e forno elétrico'));

        DB::insert('insert into produtos 
      (nome, quantidade, valor, descricao');
    }

}
