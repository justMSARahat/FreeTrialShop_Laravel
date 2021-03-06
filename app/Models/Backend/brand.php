<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory;

    public function product()
    {
    	return $this->hasMany(product::class);
    }
    
    public function category()
    {
    	return $this->hasMany(category::class);
    }
}
