<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = ['date', 'vehicle_id', 'mechanical_workshop_id'];

    public function vehicle()
    {
        return $this->belongsTo('App\Vehicle');
    }

    public function maintenance_type()
    {
        return $this->belongsTo('App\MaintenanceType');
    }

    public function mechanical_workshop()
    {
        return $this->belongsTo('App\MechanicalWorkshop');
    }
}
