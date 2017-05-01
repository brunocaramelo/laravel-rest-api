<?php

namespace Convenia\Http\Controllers;

use Convenia\Service\VendedorService;
use Illuminate\Http\Request;

class VendedorController extends Controller
{
    private $vendedor = null;

    public function __construct()
    {
      $this->vendedor = new VendedorService();
    }

    public function index()
    {
    }

    public function list()
    {
        return response()->json( $this->vendedor->listarNomeEmail() );
    }

    public function create( Request $request )
    {
         return response()->json( $this->vendedor->criar( $request->all() ) );
    }

  
  
}
