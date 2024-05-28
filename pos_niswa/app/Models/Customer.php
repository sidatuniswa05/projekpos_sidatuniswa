<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HansMany;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=['name','email','phone','address'];

    public function order():HansMany
{
    return $this->hansMany(Order::class);

}

}


