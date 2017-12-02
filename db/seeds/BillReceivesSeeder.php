<?php


use Faker\Factory;
use Phinx\Seed\AbstractSeed;

class BillReceivesSeeder extends AbstractSeed
{

    const NAMES = [
        'Sálarios',
        'Frela',
        'Restituição do Imposto de Renda',
        'Venda de produtos usados',
        'Bolsa de valores',
        'CDI',
        'Tesouro direto',
        'Previdência Privada'
    ];

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = Factory::create('pt_BR');
        $faker->addProvider($this);
        $billReceives = $this->table('bill_receives');
        $data = []; 
        foreach (range(1, 20) as $value) {
            $data[] = [
                'date_launch' => $faker->date(),
                'name' => $faker->billReceivesName(),
                'value' => $faker->randomFloat(2, 10, 2000),
                'user_id' => rand(1, 4),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        $billReceives->insert($data)->save();
    }


    public function billReceivesName() {
        return \Faker\Provider\Base::randomElement(self::NAMES);
    }
}
