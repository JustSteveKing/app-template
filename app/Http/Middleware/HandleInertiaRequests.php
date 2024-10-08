<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Http\Resources\PlanResource;
use App\Http\Resources\UserResource;
use App\Models\Plan;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    public function __construct(
        private readonly AuthManager $auth,
    ) {
    }

    /** @return array<string,mixed> */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $this->auth->check() ? new UserResource(
                    resource: $this->auth->user(),
                ) : null,
            ],
            'app' => [
                'name' => config('app.name'),
                'plans' => PlanResource::collection(
                    resource: Plan::query()->get(),
                ),
            ],
        ];
    }
}
