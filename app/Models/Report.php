<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'title', 'type', 'generated_by', 'content', 'generated_at'
    ];
}
