<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Laravel\Cashier\Subscription as CashierSubscription;

/**
 * @property string $id
 * @property string $keyType
 * @property string $stripe_id
 * @property string $stripe_status
 * @property null|string $stripe_price
 * @property null|int $quantity
 * @property string $user_id
 * @property null|CarbonInterface $trial_ends_at
 * @property null|CarbonInterface $ends_at
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 * @property User $owner
 * @property Collection<SubscriptionItem> $items
 */
final class Subscription extends CashierSubscription
{
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'type',
        'stripe_id',
        'stripe_status',
        'stripe_price',
        'quantity',
        'user_id',
        'trial_ends_at',
        'ends_at',
    ];
}
