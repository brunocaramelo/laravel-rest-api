<?php

namespace Convenia\Service;

use Convenia\Model\VendaModel;

class VendaService{


    private $venda = null;

    public function __construct(){
        $this->venda = new VendaModel();
    }

    public function criar( array $dados ){
       
        $criado =  $this->venda::create( $dados );

        return ['venda' => ['nome' => $criado->vendedor->nome , 
                            'email' => $criado->vendedor->email,
                            'valor' => $criado->valor_venda,
                            'comissao' => ( $criado->valor_venda * 0008.5 ),
                            'data' => $criado->data_venda,
                             ]
                ];
    }

    
    public function listarPorVendedor( int $id ){
       
       $return = [];
       $findBy = $this->venda::where('vendedor_id', $id)->get();

       foreach( $findBy as $vendaItem){
    
        $return['vendas'][] = [
                           'nome' => $vendaItem->vendedor->nome , 
                            'email' => $vendaItem->vendedor->email,
                            'valor' => $vendaItem->valor_venda,
                            'comissao' => ( $vendaItem->valor_venda * 0008.5 ),
                            'data' => $vendaItem->data_venda,
                    ];
       }

       return $return;

    }


}


