<?php

declare(strict_types=1);

namespace App\Services\Billing;

use Stripe\Collection;
use Stripe\Exception\ApiErrorException;
use Stripe\Plan;
use Stripe\StripeClient;

final readonly class Stripe
{
    public function __construct(
        private StripeClient $client,
    ) {
    }

    /**
     * @return Collection<Plan>
     * @throws ApiErrorException
     */
    public function plans(): Collection
    {
        return $this->client->plans->all();
    }
}
