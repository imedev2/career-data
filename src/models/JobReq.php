<?php

namespace Imedev2\Career1\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class JobReq extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'rand_url',
                'onUpdate'  => true,
            ]
        ];
    }


    protected $table = 'job_reqs';
    protected $fillable = [
        'job_id',
        'name',
        'message',
        'order',
        'review',
        'email',
        'slug',
        'rand_url'
    ];
    protected $appends = ['new_jobreq_id'];



    public function getNewJobReqIdAttribute()
    {
        if ($this->job->company_id == 1)
        {
            return sprintf("FFKR001-%03d", $this->id);
        }
        if ($this->job->company_id == 2)
        {
            return sprintf("IMER002-%03d", $this->id);
        }
    }

    public function job()
    {
        return $this->belongsTo('Imedev2\Career\Models\Job','job_id');
    }

    public function file()
    {
        return $this->hasOne('Imedev2\Career\Models\File','jobReq_id');
    }
}
