<?php
namespace App\Utils;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait ModelImage {
    protected function image(): Attribute {
        return Attribute::make(
            get: fn(?string $value) => $value ? asset($value) : asset('images/1x1_picture.png')
        );
    }
}
