<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasMany;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'name',
])]
#[HasMany(Book::class)]
final class BookCase extends Model
{
    use Virtue;
}
