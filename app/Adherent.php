<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{

    /**
     * Get the user that owns the adherents.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the user that owns the adherents.
     */
    public function child()
    {
        return $this->belongsTo('App\Child');
    }
}
