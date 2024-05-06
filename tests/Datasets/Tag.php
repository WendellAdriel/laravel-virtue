<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\MorphedByMany;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[MorphedByMany(Post::class, 'taggable')]
final class Tag extends Model
{
    use Virtue;
}
