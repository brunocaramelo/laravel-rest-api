<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         DB::table('vendedor')->insert([
            'id' => '1',
            'nome' => 'dunha',
            'email' =>  'dunha@gmail.com',
            'cpf' => '95868745608',
        ]);

         DB::table('venda')->insert([
                                   'vendedor_id' => '1',
                                   'valor_venda' => '01.55',
                                   'data_venda' => '2017-02-03 11:10:30',
                                    ]);
    }
}
