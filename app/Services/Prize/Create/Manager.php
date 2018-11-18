<?php

namespace App\Services\Prize\Create;

use App\Models\{PrizeType, PrizeAction};

class Manager
{
    protected $limiter, $factory, $data = [];

    public function __construct(
        Calculator $calculator,
        Limiter $limiter,
        Factory $factory
    ) {
        $this->calculator = $calculator;
        $this->limiter = $limiter;
        $this->factory = $factory;
    }

    public function definition()
    {
        if (!$this->defineType()->calculateValue()->checkLimit()) {
            $this->definition();
        }

        return $this;
    }

    public function decrementLimit()
    {
        $this->limiter->decrement($this->get('prizeType'), $this->get('value'));

        return $this;
    }

    public function create()
    {
        $prize = $this->factory->create($this->data);

        $prize->action()->create(['type' => PrizeAction::CREATED]);

        return $prize;
    }

    protected function defineType()
    {
        $this->data['prizeType'] = PrizeType::getRandom();

        return $this;
    }

    protected function calculateValue()
    {
        $value = $this->calculator->handle($this->get('prizeType'));

        $this->data['value'] = $value;

        return $this;
    }

    protected function checkLimit()
    {
        return $this->limiter->handle($this->get('prizeType'), $this->get('value'));
    }

    public function get(string $key)
    {
        return $this->data[$key] ?? null;
    }
}
