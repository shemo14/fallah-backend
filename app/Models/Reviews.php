<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    public function user(){
        return $this->belongsTo('App\User', 'created_by', 'id');
    }

    public function reviewer(){
        return $this->belongsTo('App\User', 'reviewed_by', 'id');
    }
}
