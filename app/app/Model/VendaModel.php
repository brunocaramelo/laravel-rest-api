<?php

namespace Convenia\Model;

use Illuminate\Database\Eloquent\Model;

class VendaModel extends Model
{
   protected $table = 'venda';

   protected $fillable = [
                           'vendedor_id',
                           'valor_venda',
                           'data_venda',
                           ];

   public function vendedor()
   {

        return $this->belongsTo('Convenia\Model\VendedorModel');

   }
   

}
