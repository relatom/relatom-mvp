<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'start_at' => 'datetime',
        'finish_at' => 'datetime',
    ];


    /**
     * The roles that belong to the user.
     */
    public function participants()
    {
        return $this->belongsToMany('App\Adherent', 'adherents_has_events');
    }

    /**
     * The roles that belong to the user.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
