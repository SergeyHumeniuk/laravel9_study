<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        public function productCategory(){
            return $this->hasOne(Product_category::class, 'id_product');
        }
        public function productImages()
        {
            return $this->hasMany(Product_image::class, 'id_product');
        }
        public function productQuantety(){
            return $this->hasOne(Product_quantety::class, 'id_product');
        }
        public function productOptions()
        {
            return $this->hasMany(Product_option::class, 'id_product');
        }
}
