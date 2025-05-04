<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'ip_address', 'hostname', 'status', 'type', 'location', 'is_managed'
    ];

    public function polls()
    {
        return $this->hasMany(PollResult::class);
    }

    public function alerts()
    {
        return $this->hasMany(Alert::class);
    }
}
