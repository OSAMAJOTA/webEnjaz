<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class maids extends Model
{
    protected $guarded = [];

    public function maids_attachments()
    {
        return $this->belongsTo('App\maids_attachments','maids_id');
    }

}
