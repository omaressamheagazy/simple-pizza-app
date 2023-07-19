<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = ['pizza_id', 'user_id'];

    public function pizza() {
        return $this->belongsTo(Pizza::class, 'pizza_id');
    }
    public static function empty($userID) {
        self::where('user_id', $userID)->delete();
    }
}
