<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    public function employee(){
    	return $this->hasMany("App\employee","service_id","id");
    }
}
