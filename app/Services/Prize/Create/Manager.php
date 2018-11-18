<?php

namespace App\Services\Prize\Create;

use App\Models\{Prize, PrizeType, PrizeAction};

class Manager
{
    protected $calculator, $limiter, $factory, $data = [];

    public function __construct(
        Calculator $calculator,
        Limiter $limiter,
        Factory $factory
    ) {
        $this->calculator = $calculator;
        $this->limiter = $limiter;
        $this->factory = $factory;
    }

    public function definition(): self
    {
        if (!$this->defineType()->calculateValue()->checkLimit()) {
            $this->definition();
        }

        return $this;
    }

    public function decrementLimit(): self
    {
        $this->limiter->decrement($this->get('prizeType'), $this->get('value'));

        return $this;
    }

    public function create(): Prize
    {
        $prize = $this->factory->create($this->data);

        $prize->action()->create(['type' => PrizeAction::CREATED]);

        return $prize;
    }

    protected function defineType(): self
    {
        $this->data['prizeType'] = PrizeType::getRandom();

        return $this;
    }

    protected function calculateValue(): self
    {
        $value = $this->calculator->handle($this->get('prizeType'));

        $this->data['value'] = $value;

        return $this;
    }

    protected function checkLimit(): bool
    {
        return $this->limiter->handle($this->get('prizeType'), $this->get('value'));
    }

    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }
}
