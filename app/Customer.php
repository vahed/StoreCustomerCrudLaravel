<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Customer extends Model
{
    protected $fillable = ['Id','StoreId','Firstname','Lastname','Phone','Email','updated_at','created_at'];
}