<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use App\Helpers\Slug;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','slug','body','category_id','image_path','approved'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function category() {
        return $this->belongsTo(category::class);
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }

    public function scopeApproved()  {
        return $this->whereApproved(1)->latest();
    }

    protected function title(): Attribute {
        return Attribute::make(
            set: fn ($value) => [
                'title' => $value,
                'slug' => Slug::uniqueSlug($value,'posts'),
            ]
        );
    }

}
