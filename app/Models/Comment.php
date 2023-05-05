<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Comment extends Authenticatable
{
    use HasFactory, HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->getKey() == null) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
        });
    }

    protected $fillable = [
        'body',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function stories(): BelongsToMany
    {
        return $this->belongsToMany(Story::class);
    }

    public function episodes(): BelongsToMany
    {
        return $this->belongsToMany(Episode::class);
    }

    public function replies(): BelongsToMany
    {
        return $this->belongsToMany(Comment::class, 'replies', 'replying_comment_id', 'replied_comment_id');
    }

    public function like(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->wherePivot('user_id', auth()->id());
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
