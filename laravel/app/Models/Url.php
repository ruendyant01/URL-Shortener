<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ["originalUrl",'user_id',"title"];

    protected $appends = ["path"];

    public function getRouteKeyName()
    {
        return "shortUrl";
    }
    protected static function booted() {
        static::creating(function(Url $url) {
            $url->shortUrl = Str::random(5);
        });
    }

    protected function path() : Attribute {
        return Attribute::make(
            get: fn(mixed $val) => asset("u/".$this->shortUrl)
        );
    }

    protected function createdAt() : Attribute {
        return Attribute::make(
            get: fn($val) => Carbon::parse($val)->diffForHumans()
        );
    }
}
