<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Relations\BelongsTo;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasMany;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'name',
])]
#[BelongsTo(BookCase::class)]
#[HasMany(Price::class, null, 'custom_id', 'id')]
class Book extends Model
{
    use Virtue;
}
