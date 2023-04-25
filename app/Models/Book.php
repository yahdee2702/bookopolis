<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Utils\ModelImage;

class Book extends Model
{
    use HasFactory, ModelImage;

    protected $fillable = [
        'title',
        'author',
        'slug',
        'genre',
        'description',
        'price',
        'stars',
        'stocks',
        'image'
    ];

    protected $appends = ["sold"];

    protected $with = ['seller'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function boot()
    {
        parent::boot();
        self::saving(function ($model) {
            $model->slug = Str::slug($model->title . " " . $model->id, "-");
        });
    }

    public function getSoldAttribute()
    {
        return $this->orders()->select('amount')->sum('amount');
    }

    public function seller()
    {
        return $this->belongsTo(Admin::class);
    }

    public function getSeller()
    {
        return $this->seller()->first();
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
