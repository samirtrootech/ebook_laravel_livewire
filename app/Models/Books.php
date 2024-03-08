<?php

namespace App\Models;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Books extends Model
{
    use HasFactory;

    protected $primaryKey = "uuid";

    public $incrementing = false;

    protected $fillable = [
        'name',
        'description',
        'image',
        'cover',
        'price'
    ];

    public function getImageUrlAttribute(): string|null
    {
        return Storage::disk('local')->get("public/images/$this->uuid/$this->image") ? asset(Storage::disk('local')->url("public/images/$this->uuid/$this->image")) : $this->image;
    }
    public function getCoverUrlAttribute(): string|null
    {
        return Storage::disk('local')->get("public/images/$this->uuid/$this->cover") ? asset(Storage::disk('local')->url("public/images/$this->uuid/$this->cover")) : $this->cover;
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, "users_books", "books_id", "users_id", "uuid")->withTimestamps();
    }
    public function scopeFilter(Builder $query, $search): Builder
    {
        $search = strtolower($search);
        return $query->where('name', "like", "%$search%")->orWhere('description', 'like', "%$search%");
    }
}
