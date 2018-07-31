<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = "users";
    public $timestamps = false;
    
    protected $fillable = array('name',
        'email', 'password', 'remember_token'); //define quem pode ser populado/manipulado
    
    protected $guarded = ['id']; // oq for declarado aqui não pode ser manipulado/alterado
}
