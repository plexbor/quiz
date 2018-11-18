<?php

namespace App\Services\Prize;

use App\Services\Prize\Action\Manager as ActionManager;
use App\Services\Prize\Create\Manager as CreateManager;

use App\Http\Resources\PrizeResource;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Prize;

use DB;

class PrizeService
{
    protected $repository, $actionManager, $createManager;

    public function __construct(
        Repository $repository,
        CreateManager $createManager,
        ActionManager $actionManager
    ) {
        $this->repository = $repository;
        $this->actionManager = $actionManager;
        $this->createManager = $createManager;
    }

    public function list(): JsonResource
    {
        $prizes = $this->repository->getAll();

        return PrizeResource::collection($prizes);
    }

    public function create(): JsonResource
    {
        return DB::transaction(function () {
            $prize = $this->createManager->definition()->decrementLimit()->create();

            return $this->response($prize);
        });
    }

    public function confirm(Prize $prize): JsonResource
    {
        return DB::transaction(function () use ($prize) {
            $prize = $this->actionManager->confirm($prize);

            return $this->response($prize);
        });
    }

    public function convert(Prize $prize): JsonResource
    {
        return DB::transaction(function () use ($prize) {
            $prize = $this->actionManager->convert($prize);

            return $this->response($prize);
        });
    }

    public function decline(Prize $prize): JsonResource
    {
        return DB::transaction(function () use ($prize) {
            $prize = $this->actionManager->decline($prize);

            return $this->response($prize);
        });
    }

    protected function response(Prize $prize): PrizeResource
    {
        return new PrizeResource($prize->load('type', 'action'));
    }
}
