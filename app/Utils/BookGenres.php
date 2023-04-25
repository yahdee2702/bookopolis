<?php
namespace App\Utils;
use Illuminate\Support\Collection;

enum BookGenres: string {
    case History = "history";
    case Computer = "computer";
    case Science = "science";
    case Fiction = "fiction";
    case Novel = "novel";
    case Others = "others";

    public static function values() {
        return array_map(function($array) {
            return $array->value;
        }, BookGenres::cases());
    }
}
