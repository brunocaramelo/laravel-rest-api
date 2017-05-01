<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Artisan as Artisan;
use Illuminate\Database\Seeder;

class ApiTest extends TestCase
{
    
    public function setUp(){
        parent::setUp();
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }


   public function testListVendedor()
    {   
           $return = $this->get('/api/v1/vendedores')
           ->assertStatus(200)
            ->assertJson([
                'vendedores' => 
                                    ['0' => 
                                             [
                                                 'nome' => 'dunha',
                                                 'email' => 'dunha@gmail.com',
                                             
                                             ]
                                ] 
            ]);

    }

   public function testCriarVendedor()
    {   
           $return = $this->post('/api/v1/vendedor/create',[
                                                            'nome' => 'segundo' , 
                                                            'email' => 'segundo@empresa.com',
                                                            'cpf' => '444455588788',
                                                                ])
                             ->assertStatus(200)
                             ->assertJson([
                                    'vendedor' => 
                                                    [
                                                        'nome' => 'segundo',
                                                        'email' => 'segundo@empresa.com',
                                                    
                                                    ]
                                                    
                                ]);

    }

    
   public function testCriarVenda()
    {   
           $return = $this->post('/api/v1/venda/create',[
                                                            'vendedor_id' => '1',
                                                            'valor_venda' => '3346.55',
                                                            'data_venda' => '2017-10-10 10:20:30',
                                                        ])->assertStatus(200)
                             ->assertJson([
                                    'venda' =>  
                                                        [
                                                        'nome' => 'dunha',
                                                        'email' => 'dunha@gmail.com',
                                                         'valor' => '3346.55',
                                                        'comissao' => '28445.675',
                                                        'data' => '2017-10-10 10:20:30'
                                                        ]
                                                    
                                ]);
                                             
    }



     public function testListVendasPorVendedor()
    {   
           $this->testCriarVenda();
           
           $id = '1';
           
           $return = $this->get('/api/v1/vendas-por-vendedor/'.$id)
                            ->assertStatus(200)
                             ->assertJson([
                                    'vendas' =>  
                                                        
                                                        [
                                                                [
                                                                    "nome" => "dunha",
                                                                    "email"=> "dunha@gmail.com",
                                                                    "valor"=> "1.55",
                                                                    "comissao"=> '13.175',
                                                                    "data"=> "2017-02-03 11:10:30"
                                                                ],
                                                                [
                                                                'nome' => 'dunha',
                                                                'email' => 'dunha@gmail.com',
                                                                'valor' => '3346.55',
                                                                'comissao' => '28445.675',
                                                                'data' => '2017-10-10 10:20:30'
                                                                ]
                                                        ]
                                                    
                                ]);   

    }

     public function tearDown()
    {
        Artisan::call('migrate:reset');
        parent::tearDown();
    }

}
