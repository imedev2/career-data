<?php

namespace Imedev2\Career1\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','email','message'];
}
