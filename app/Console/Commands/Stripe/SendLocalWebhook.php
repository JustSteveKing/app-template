<?php

declare(strict_types=1);

namespace App\Console\Commands\Stripe;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

use function Laravel\Prompts\select;

#[AsCommand(name: 'stripe:trigger', description: 'Trigger a local stripe webhook for testing.')]
class SendLocalWebhook extends Command
{
    public function handle(): int
    {
        $hook = select(
            label: 'Which webhook would you like to send?',
            options: [
                'customer.subscription.created' => 'Subscription created',
                'customer.subscription.updated' => 'Subscription updated',
                'customer.subscription.deleted' => 'Subscription deleted',
                'customer.updated' => 'Customer updated',
                'customer.deleted' => 'Customer deleted',
                'payment_method.automatically_updated' => 'Payment method automatically updated',
                'invoice.payment_action_required' => 'Invoice payment action required',
                'invoice.payment_succeeded' => 'Invoice payment succeeded',
            ]
        );

        Process::run(
            command: "stripe trigger {$hook}",
            output: static function (string $type, string $output): void {
                echo $output;
            },
        );

        return SymfonyCommand::SUCCESS;
    }
}
