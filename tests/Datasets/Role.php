<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\BelongsToMany;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[BelongsToMany(User::class)]
final class Role extends Model
{
    use Virtue;
}
