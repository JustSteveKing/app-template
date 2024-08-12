<?php

declare(strict_types=1);

namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $id
 * @property string $stripe_id
 * @property string $stripe_product_id
 * @property string $nickname
 * @property string $interval
 * @property int $interval_count
 * @property int $amount
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 */
class Plan extends Model
{
    use HasFactory;
    use HasUlids;

    /** @var array<int,string> */
    protected $fillable = [
        'stripe_id',
        'stripe_product_id',
        'nickname',
        'interval',
        'interval_count',
        'amount',
    ];

    /** @return array<string,string> */
    protected function casts(): array
    {
        return [
            'interval_count' => 'integer',
            'amount' => 'integer',
        ];
    }
}
