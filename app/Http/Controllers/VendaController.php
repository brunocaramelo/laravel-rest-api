<?php

namespace Convenia\Http\Controllers;

use Convenia\Service\VendaService;
use Illuminate\Http\Request;

class VendaController extends Controller
{
   public function __construct()
    {
      $this->venda = new VendaService();
    }

  public function listarPorVendedor(Request $request )
    {
        return response()->json( $this->venda->listarPorVendedor( $request->route( 'id' , 1 ) ) );
    }

    public function create( Request $request )
    {
         return response()->json( $this->venda->criar( $request->all() ) );
    }

}
