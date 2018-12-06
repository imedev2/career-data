<?php

namespace Imedev2\Career1\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{

    protected $fillable = ['filename','jobReq_id'];


    public function jobReq()
    {
        return $this->belongsTo('Imedev2\Career1\Models\Job','jobReq_id');
    }
}
