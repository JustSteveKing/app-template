<?php

declare(strict_types=1);

namespace App\Http\Controllers\Billing;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Response;
use Inertia\ResponseFactory;

final readonly class IndexController
{
    public function __construct(
        private ResponseFactory $factory,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        /** @var User $user */
        $user = $request->user();

        return $this->factory->render(
            component: 'Billing/Index',
            props: [
                'subscriptions' => $user->subscriptions,
            ],
        );
    }
}
