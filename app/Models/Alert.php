<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'device_id', 'type', 'message', 'severity', 'status', 'triggered_at'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
