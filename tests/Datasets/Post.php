<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Relations\BelongsTo;
use WendellAdriel\Virtue\Models\Attributes\Relations\MorphMany;
use WendellAdriel\Virtue\Models\Attributes\Relations\MorphToMany;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'title',
    'content',
])]
#[BelongsTo(related: User::class, name: 'author')]
#[MorphMany(Image::class, 'imageable')]
#[MorphToMany(Tag::class, 'taggable')]
final class Post extends Model
{
    use Virtue;
}
