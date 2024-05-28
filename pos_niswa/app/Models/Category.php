<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relation\HansMany;

class Category extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
       
    ];
    public function product():HansMany
    {
        return $this->hansMany(Product::class);
        }
}

