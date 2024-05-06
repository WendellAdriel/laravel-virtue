<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\BelongsTo;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[BelongsTo(User::class)]
final class Phone extends Model
{
    use Virtue;
}
