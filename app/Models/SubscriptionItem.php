<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Cashier\SubscriptionItem as CashierSubscriptionItem;

/**
 * @property string $id
 * @property string $stripe_id
 * @property string $stripe_price
 * @property null|int $quantity
 * @property string $subscription_id
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property Subscription $subscription
 */
final class SubscriptionItem extends CashierSubscriptionItem
{
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'stripe_id',
        'stripe_product',
        'stripe_price',
        'quantity',
        'subscription_id',
    ];
}
