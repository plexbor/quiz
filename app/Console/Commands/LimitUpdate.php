<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\PrizeType;

class LimitUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'limit:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update limits';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach (config('limit') as $name => $limit) {
            $this->{camel_case($name)}($limit);
        }

        $this->info('Update limits completed successfully.');
    }

    private function prizeType(array $limit)
    {
        PrizeType::whereId(PrizeType::MONEY)->update(['limit' => $limit['money']]);

        PrizeType::whereId(PrizeType::THING)->update(['limit' => $limit['thing']]);
    }
}
