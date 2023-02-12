<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * @property mixed $id
 */
class Company extends Authenticatable implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected string $guard = 'company';

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    public function imageUrl()
    {
        return Media::find($this->id)?->getUrl();
    }

}
