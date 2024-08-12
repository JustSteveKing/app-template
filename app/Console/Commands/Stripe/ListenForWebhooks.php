<?php

declare(strict_types=1);

namespace App\Console\Commands\Stripe;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Process;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

#[AsCommand(name: 'stripe:listen', description: 'Start forwarding events using the Stripe CLI.')]
class ListenForWebhooks extends Command
{
    public function handle(): int
    {
        Process::forever()->run(
            command: 'stripe listen --forward-to template.test/stripe/webhook',
            output: function (string $type, string $output): void {
                echo $output;
            },
        );

        return SymfonyCommand::SUCCESS;
    }
}
