<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'vin', 'plate_number', 'color', 'manufacturer', 'model',
        'transmission', 'body_type', 'mileage', 'year', 'user_id'
    ];

    public function maintenances()
    {
        return $this->hasMany('App\Maintenance');
    }

    public function owner()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
