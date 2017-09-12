<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'price', 'quantity', 'image_url', 'category_id', 'manufacturer_id'
    ];

    public function category()
  {
  	return $this->belongsTo('App\Category');
  }


   public function manufacturer()
  {
  	return $this->belongsTo('App\Manufacturer');
  }


}
