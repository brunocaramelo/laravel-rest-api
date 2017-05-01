<?php

namespace Convenia\Model;

use Illuminate\Database\Eloquent\Model;

class VendedorModel extends Model
{
   
    protected $table = 'vendedor';
    
    protected $fillable = [
                           'nome',
                           'email',
                           'cpf',
                           ];
   
   public function vendas(){

      return  $this->hasMany('Convenia\Model\VendaModel','id','vendedor_id');

    }

}
