<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    public function service(){
    	return $this->belongsTo("App\service","service_id","id");
    }
}
