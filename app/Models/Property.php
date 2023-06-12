<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable=['title','descreption','adress','floor','rooms','bedrooms','price','surface','sold'];


    public function options()
    {
        return $this->belongsToMany(Option::class);
    }
}