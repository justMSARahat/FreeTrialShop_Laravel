<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    public function brand()
    {
    	return $this->belongsTo(brand::class);
    }

    public function product()
    {
    	return $this->hasMany(product::class);
    }

    public function parent()
    {
    	return $this->belongsTo(category::class, 'is_parent' );
    }

}
