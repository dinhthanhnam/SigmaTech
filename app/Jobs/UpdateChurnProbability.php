<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Log;

class UpdateChurnProbability implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $users = User::skip(1)->take(PHP_INT_MAX)->get();

        foreach ($users as $user) {
            $features = [
                'recency_days' => $user->recency_days,
                'frequency' => $user->frequency,
                'monetary' => $user->monetary,
                'cart_abandon_rate' => $user->cart_abandon_rate,
            ];
            Log::info('Processing user ID: ' . $user->id);

            $process = new Process(['python', 'predict_churn.py', json_encode($features)]);
            $process->run();

            if ($process->isSuccessful()) {
                $result = json_decode($process->getOutput(), true);
                $user->churn_probability = $result['probability'];
                $user->save();
                Log::info('Updated churn probability for user ID: ' . $user->id);
            } else {
                // Log lỗi nếu có
                Log::error('Error predicting churn for user ID: ' . $user->id);
                Log::error($process->getErrorOutput());
            }
            
        }
    }
}
