<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Convenia\Service\VendedorService;

use Illuminate\Support\Facades\Artisan as Artisan;
use Illuminate\Database\Seeder;

class VendedorTest extends TestCase
{
    use DatabaseMigrations;
    
    public function setUp(){
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    public function testListarUmItemVindoDoSeeder()
    {

        $vendedor = new VendedorService();
        $lista = $vendedor->listarNomeEmail();
        
        $this->assertEquals( 1 ,count($lista) );
        $this->assertTrue( isset($lista['vendedores'][0]['nome']) );
    
    }

    public function testCriarVendedor()
    {

        $vendedor = new VendedorService();

        $criado = $vendedor->criar([
                                   'nome' => 'segundo' , 
                                   'email' => 'segundo@empresa.com',
                                   'cpf' => '444455588788',
                                    ]);

        $aguardado = '{"vendedor":{"nome":"segundo","email":"segundo@empresa.com"}}';
        
        $this->assertEquals($aguardado, json_encode( $criado ) );
    
    }


    

    public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

}
