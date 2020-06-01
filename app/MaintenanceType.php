<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaintenanceType extends Model
{
    protected $fillable = ['description'];

    public function maintenances()
    {
        return $this->hasMany('App\Maintenance');
    }
}
