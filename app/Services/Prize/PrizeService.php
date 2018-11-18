<?php

namespace App\Services\Prize;

use App\Services\Prize\Action\Manager as ActionManager;
use App\Services\Prize\Create\Manager as CreateManager;

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
        return $this->repository->getAll();
    }

    public function create()
    {
        return DB::transaction(function () {
            return $this->createManager->definition()->decrementLimit()->create();
        });
    }

    public function confirm(Prize $prize)
    {
        return DB::transaction(function () use ($prize) {
            return $this->actionManager->confirm($prize);
        });
    }

    public function convert(Prize $prize)
    {
        return DB::transaction(function () use ($prize) {
            return $this->actionManager->convert($prize);
        });
    }

    public function decline(Prize $prize)
    {
        return DB::transaction(function () use ($prize) {
            return $this->actionManager->decline($prize);
        });
    }
}
