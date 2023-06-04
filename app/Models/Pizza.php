<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Pizza extends Model
{
    use HasFactory;
    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ( $value) => convertMoneyFromCents($value),
            set: fn ( $value) => calculateMoneyInCents($value),
        );
    }
}
