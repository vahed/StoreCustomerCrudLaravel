<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{	
    protected $fillable = ['id','StoreId','Phone','Name','Domain','Status','Street','State','updated_at','created_at'];
}