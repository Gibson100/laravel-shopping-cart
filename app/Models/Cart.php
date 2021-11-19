<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    use HasFactory;
    protected $fillable = ['uid','pid','pname','pprice','qty','total_price','pimage'];
    protected $table = 'cart';
}
