<?php

namespace Imedev2\Career1\Models;

use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

use Cviebrock\EloquentSluggable\Sluggable;

class Job extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'rand',
                'onUpdate'  => true,
            ]
        ];
    }

    protected $table = 'jobs';
    protected $fillable = ['company_id',
        'title',
        'arabic_title',
        'description',
        'arabic_description',
        'no_req',
        'order',
        'visible',
        'up_date',
        'slug',
        'rand'
    ];

    protected $appends = ['new_job_id'];
    protected $dates = ['up_date'];


    public function getNewJobIdAttribute()
    {
        if ($this->company_id == 1)
        {
            return sprintf("FFK001-%03d", $this->id);
        }
        if ($this->company_id == 2)
        {
            return sprintf("IME002-%03d", $this->id);
        }
    }

    public function jobreqs()
    {
        return $this->hasMany('Imedev2\Career1\Models\JobReq');
    }


    public function company()
    {
        return $this->belongsTo('Imedev2\Career1\Models\Company','company_id');
    }
}
