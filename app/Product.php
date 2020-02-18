<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','image_url','description','price']; //filter only let the things inside bracket can be insert into sql to prevent corrupt of sql.

    protected $casts=['name'=>'String','image_url'=>'array','description'=>'String','price'=>'double']; //to convert the data into specific datatype before stored into database
    //
}
