<?php

namespace App\Console\Commands;
use App\Jobs\UpdateChurnProbability;

use Illuminate\Console\Command;

class UpdateChurnCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'churn:update'; // Tên lệnh bạn sẽ sử dụng trên command line

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cập nhật churn probability cho tất cả người dùng';


    /**
     * Execute the console command.
     */
    public function handle()
    {
        UpdateChurnProbability::dispatch();
        $this->info('Churn probability update job dispatched.');
    }
}
