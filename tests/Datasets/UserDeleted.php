<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

final class UserDeleted
{
    use Dispatchable;
    use SerializesModels;

    public function __construct(
        public UserEvents $user,
    ) {
    }
}
