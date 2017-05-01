<?php

namespace Convenia\Service;

use Convenia\Model\VendedorModel;

class VendedorService{
    
    private $vendedor = null;

    public function __construct(){

        $this->vendedor = new VendedorModel();
    }
    
    public function listar(){
       return $this->vendedor::all();
    }

    public function listarNomeEmail(){
       
       $return = [];
       
       foreach( $this->vendedor::all() as $vendedorItem){
       
        $return['vendedores'][] = [
                            'nome' => $vendedorItem->nome,
                            'email' => $vendedorItem->email
                    ];
       }

       return $return;

    }

    public function criar( array $dados ){
       
        $criado =  $this->vendedor::create( $dados );
        return ['vendedor' => ['nome' => $criado->nome , 'email' => $criado->email ]];
    }


}