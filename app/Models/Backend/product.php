<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    public function brand()
    {
    	return $this->belongsTo(brand::class);
    }

    public function category()
    {
    	return $this->belongsTo(category::class);
    }
}
