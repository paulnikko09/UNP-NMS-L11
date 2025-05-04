<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PollResult extends Model
{
    protected $fillable = [
        'device_id', 'latency', 'packet_loss', 'cpu_usage', 'status', 'polled_at'
    ];

    public function device()
    {
        return $this->belongsTo(Device::class);
    }
}
