<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Convenia\Service\VendaService;

use Illuminate\Support\Facades\Artisan as Artisan;
use Illuminate\Database\Seeder;


class VendaTest extends TestCase
{
   use DatabaseMigrations;
    
    public function setUp(){
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function testCriarVenda()
    {

        $venda = new VendaService();
       
        $criado = $venda->criar([
                                   'vendedor_id' => '1',
                                   'valor_venda' => '3346.55',
                                   'data_venda' => '2017-10-10 10:20:30',
                                    ]);

        $aguardado = '{"venda":{"nome":"dunha","email":"dunha@gmail.com","valor":"3346.55","comissao":28445.675,"data":"2017-10-10 10:20:30"}}';
        
        $this->assertEquals($aguardado, json_encode( $criado ) );
    
    }

    public function testListarUmItemVindoDoSeeder()
    {
        $this->testCriarVenda();

        $venda = new VendaService();
        $lista = $venda->listarPorVendedor( 1 );
        
        $this->assertEquals( 1 ,count($lista) );
        $this->assertTrue( isset($lista['vendas'][0]['nome']) );
    
    }


}
