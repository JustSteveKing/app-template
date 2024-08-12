<?php

declare(strict_types=1);

namespace App\Listeners\Billing;

use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    public function handle(WebhookReceived $event): void
    {
        if ('invoice.payment_succeeded' === $event->payload['type']) {
            // Handle the incoming event...
        }
    }
}
