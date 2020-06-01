<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'date', 'score', 'description', 'user_id',
        'mechanical_workshop_id', 'maintenance_id'
    ];

    public function mechanical_workshop()
    {
        return $this->belongsTo('App\MechanicalWorkshop');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function maintenance()
    {
        return $this->belongsTo('App\Maintenance');
    }
}
