<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
     //protected $fillable = ['name'];

    /**
     * Get the user that owns the task.
     */
    public function property()
    {
        return $this->belongsTo(Properties::class);
    }
}
