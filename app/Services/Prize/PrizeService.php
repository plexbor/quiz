<?php

namespace App\Services\Prize;

use App\Services\Prize\Action\Manager as ActionManager;
use App\Services\Prize\Create\Manager as CreateManager;

use App\Models\Prize;

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
        return $this->createManager->definition()->create();
    }

    public function confirm(Prize $prize)
    {
        return $this->actionManager->confirm($prize);
    }
}
