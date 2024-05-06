<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasMany;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasManyThrough;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[HasMany(User::class)]
#[HasManyThrough(Post::class, User::class)]
final class Country extends Model
{
    use Virtue;
}
