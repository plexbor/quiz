<?php

use Illuminate\Database\Seeder;

use App\Models\PrizeType;

class PrizeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getData() as $data) {
            PrizeType::updateOrCreate([
                'id' => $data['id'],
            ], [
                'name' => $data['name'],
            ]);
        }
    }

    private function getData()
    {
        return [
            [
                'id' => PrizeType::MONEY,
                'name' => 'Деньги',
            ],
            [
                'id' => PrizeType::BONUS,
                'name' => 'Бонусы',
            ],
            [
                'id' => PrizeType::THING,
                'name' => 'Предмет',
            ],
        ];
    }
}
