<?php


use Faker\Factory;
use Faker\Provider\Base;
use Phinx\Seed\AbstractSeed;

class CategoryCostsSeeder extends AbstractSeed
{

    const NAMESCATEGORY = [
        'Telefone', 'Supermercado', 'Água', 'Escola', 'Cartão', 'Luz', 'IPVA', 'Imposto de Renda',
        'Gasolina', 'Vestuário', 'Entretenimento', 'Reparos', 'Celular', 'Consorcio', 'Faculdade',
        'Plano de Saúde', 'Veterinário', 'Livros', 'EletroDomesticos', 'EletroEletronico'
    ];

    public function run()
    {
        $faker = Factory::create('pt_BR');
        $faker->addProvider($this);
        $categoryCosts = $this->table('category_costs');
        $data = [];
        foreach (range(1,20) as $value) {
            $data[] = [
                'name' => $faker->categoryName(),
                'user_id' => rand(1,4),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        $categoryCosts->insert($data)->save();
    }

    // generation category faker
    public function categoryName() {
        return Base::randomElement(self::NAMESCATEGORY);
    }
}

