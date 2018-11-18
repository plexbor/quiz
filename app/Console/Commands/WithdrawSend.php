<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\{PrizeAction, Withdraw};

class WithdrawSend extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'withdraw:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send withdraws';

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
        Withdraw::where('status', Withdraw::STATUS_CREATED)->chunk(10, function ($withdraws) {
            foreach ($withdraws as $withdraw) {
                $this->send($withdraw);
            }
        });

        $this->info('Withdraws send completed successfully.');
    }

    private function send(Withdraw $withdraw)
    {
        // Bank::setAccount($withdraw->account)->setAmount($withdraw->amount)->send()

        $withdraw->completed();

        $withdraw->prize->action()->create(['type' => PrizeAction::SENDED_TO_BANK]);
    }
}
