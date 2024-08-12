<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\Subscription;
use App\Models\SubscriptionItem;
use App\Services\Billing\Stripe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;
use Laravel\Cashier\Cashier;
use Stripe\StripeClient;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            abstract: Stripe::class,
            concrete: fn () => new Stripe(
                client: new StripeClient(
                    config: [
                        'api_key' => config('services.stripe.secret'),
                    ],
                ),
            ),
        );
    }

    public function boot(): void
    {
        Model::shouldBeStrict();
        JsonResource::withoutWrapping();
        Cashier::calculateTaxes();
        Cashier::useSubscriptionModel(
            subscriptionModel: Subscription::class,
        );
        Cashier::useSubscriptionItemModel(
            subscriptionItemModel: SubscriptionItem::class,
        );
    }
}
