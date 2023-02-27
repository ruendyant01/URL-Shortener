<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory;
    protected $fillable = ["originalUrl"];

    public function getRouteKeyName()
    {
        return "shortUrl";
    }
    protected static function booted() {
        static::creating(function(Url $url) {
            $url->shortUrl = Str::random(5);
        });
    }

}
