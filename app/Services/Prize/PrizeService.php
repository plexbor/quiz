<?php

namespace App\Services\Prize;

use App\Services\Prize\Action\Manager as ActionManager;
use App\Services\Prize\Create\Manager as CreateManager;

use App\Http\Resources\PrizeResource;

use App\Models\Prize;

use DB;

class PrizeService
{
    protected $repository, $createManager;

    public function __construct(
        Repository $repository,
        CreateManager $createManager,
        ActionManager $actionManager
    ) {
        $this->repository = $repository;
        $this->actionManager = $actionManager;
        $this->createManager = $createManager;
    }

    public function list()
    {
        $prizes = $this->repository->getAll();

        return PrizeResource::collection($prizes);
    }

    public function create()
    {
        return DB::transaction(function () {
            $prize = $this->createManager->definition()->decrementLimit()->create();

            return $this->response($prize);
        });
    }

    public function confirm(Prize $prize)
    {
        return DB::transaction(function () use ($prize) {
            $prize = $this->actionManager->confirm($prize);

            return $this->response($prize);
        });
    }

    public function convert(Prize $prize)
    {
        return DB::transaction(function () use ($prize) {
            $prize = $this->actionManager->convert($prize);

            return $this->response($prize);
        });
    }

    public function decline(Prize $prize)
    {
        return DB::transaction(function () use ($prize) {
            $prize = $this->actionManager->decline($prize);

            return $this->response($prize);
        });
    }

    protected function response(Prize $prize)
    {
        return new PrizeResource($prize->load('type', 'action'));
    }
}
