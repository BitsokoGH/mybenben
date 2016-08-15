<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    //
	 public function documents()
    {
        return $this->hasMany(Documents::class);
    }
}
