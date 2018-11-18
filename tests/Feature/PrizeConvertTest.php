<?php

namespace Tests\Feature;

use Tests\TestCase;
use Laravel\Passport\Passport;

use App\Models\{User, Prize, PrizeAction, PrizeType};

class PrizeConvertTest extends TestCase
{
    private $moneyType, $prize, $response;

    protected function setUp()
    {
        parent::setUp();

        $user = factory(User::class)->create();

        Passport::actingAs(
            $user,
            ['prize']
        );

        $this->moneyType = PrizeType::find(PrizeType::MONEY);

        $this->prize = factory(Prize::class)->create([
            'user_id' => $user->id,
            'prize_type_id' => $this->moneyType->id,
        ]);
    }

    public function testBasicTest()
    {
        $this->response = $this->post(route('prize.convert', $this->prize));

        $this->response->assertStatus(200);

        $this->assertResponseJson();
        $this->assertPrize();
        $this->assertPrizeType();
        $this->assertPrizeAction();
    }

    private function assertResponseJson()
    {
        $this->response->assertJsonStructure(['id', 'type', 'value', 'status', 'created_at', 'actions']);

        $this->response->assertJson([
            'id' => $this->prize->id,
            'type' => PrizeType::find(PrizeType::BONUS)->name,
            'value' => $this->prize->value * config('prize.money.conversion_rate'),
            'status' => Prize::STATUSES[Prize::STATUS_CONVERTED],
        ]);
    }

    private function assertPrize()
    {
        $this->assertDatabaseHas('prizes', [
            'id' => $this->prize->id,
            'prize_type_id' => PrizeType::BONUS,
            'value' => $this->prize->value * config('prize.money.conversion_rate'),
            'status' => Prize::STATUS_CONVERTED,
        ]);
    }

    private function assertPrizeType()
    {
        $this->assertDatabaseHas('prize_types', [
            'id' => PrizeType::MONEY,
            'limit' => $this->moneyType->limit + $this->prize->value,
        ]);
    }

    private function assertPrizeAction()
    {
        $this->assertDatabaseHas('prize_actions', [
            'prize_id' => $this->prize->id,
            'type' => PrizeAction::CONVERTED_TO_BONUS,
        ]);
    }
}
