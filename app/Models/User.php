<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = "uuid";

    public $incrementing = false;

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'profileImage'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function getFullNameAttribute(): string
    {
        return "$this->firstName $this->lastName";
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Roles::class);
    }
    public function scopeOnlyUsers(Builder $query): Builder
    {
        return $query->whereHas('role', function (Builder $q) {
            $q->where('name', 'user');
        });
    }
    public function getProfileImageUrlAttribute(): string|null
    {
        return Storage::disk('local')->get("public/images/$this->uuid/$this->profileImage") ? asset(Storage::disk('local')->url("public/images/$this->uuid/$this->profileImage")) : $this->profileImage;
    }

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Books::class, "users_books", "users_id", "books_id", "uuid")->withTimestamps();
    }
}
