<?php

namespace App\Console\Commands\Stripe;

use App\Models\Plan;
use App\Services\Billing\Stripe;
use Illuminate\Console\Command;
use Illuminate\Database\DatabaseManager;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

use Throwable;
use function Laravel\Prompts\error;
use function Laravel\Prompts\info;

#[AsCommand(name: 'stripe:plans', description: 'Sync plans from Stripe.')]
class SyncPlans extends Command
{
    public function handle(Stripe $stripe, DatabaseManager $database): int
    {
        info(message: 'Starting to sync stripe plans...');

        /** @var \Stripe\Plan $plan */
        foreach ($stripe->plans() as $plan) {
            info(message: 'Syncing plan ' . $plan->nickname . '...');

            try {
                $database->transaction(
                    callback: fn () => Plan::query()->updateOrCreate(
                        attributes: [
                            'stripe_id' => $plan->id,
                        ],
                        values: [
                            'stripe_product_id' => $plan->product,
                            'nickname' => $plan->nickname,
                            'interval' => $plan->interval,
                            'interval_count' => $plan->interval_count,
                            'amount' => $plan->amount,
                        ],
                    ),
                    attempts: 3,
                );
            } catch (Throwable $exception) {
                error(
                    message: $exception->getMessage(),
                );

                return SymfonyCommand::FAILURE;
            }
        }

        return SymfonyCommand::SUCCESS;
    }
}
