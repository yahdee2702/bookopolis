<?php

namespace App\Models;

use App\Utils\HasPassword;
use App\Utils\ModelImage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, ModelImage, HasPassword;

    protected $fillable = [
        'name',
        'username',
        'password',
        'image',
        'last_seen',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'last_online' => 'datetime',
    ];

    public function activities() {
        return $this->hasMany(Activity::class);
    }

    public function lastActivity() {
        return $this->activities()->orderBy('created_at', 'desc')->first();
    }

    public function createActivity(string $description) {
        $this->activities()->create(["description" => $description]);
    }

    public function books() {
        return $this->hasMany(Book::class, 'seller_id', 'id');
    }
}
