<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MechanicalWorkshop extends Model
{
    protected $fillable = [
        'legal_id', 'name', 'address', 'logo', 'latitude', 'longitude',
        'phone_number', 'email', 'zip_code'
    ];

    public function maintenances()
    {
        return $this->hasMany('App\Maintenance');
    }

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }
}
