<?php

declare(strict_types=1);

namespace Tests\Datasets;

use Illuminate\Database\Eloquent\Model;
use WendellAdriel\Virtue\Models\Attributes\Fillable;
use WendellAdriel\Virtue\Models\Attributes\Relations\BelongsToMany;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasMany;
use WendellAdriel\Virtue\Models\Attributes\Relations\HasOne;
use WendellAdriel\Virtue\Models\Attributes\Relations\MorphOne;
use WendellAdriel\Virtue\Models\Concerns\Virtue;

#[Fillable([
    'name',
    'email',
    'password',
])]
#[BelongsToMany(related: Role::class, name: 'roleList')]
#[HasMany(related: Post::class, name: 'articles')]
#[HasMany(WorkBook::class)]
#[HasOne(Phone::class)]
#[MorphOne(Image::class, 'imageable')]
final class User extends Model
{
    use Virtue;
}
