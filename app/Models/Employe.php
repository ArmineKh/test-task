<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
	protected $table = 'employes';
   protected $fillable = ['company_id', 'position_id', 'name', 'email', 'phone', 'salary'];
   public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }
    public function position()
    {
        return $this->belongsTo('App\Models\Position', 'position_id', 'id');
    }
}
