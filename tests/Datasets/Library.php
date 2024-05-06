<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasMany;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[HasMany(LibraryBook::class)]
final class Library extends Model
{
    use Virtue;
}
