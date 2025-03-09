<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiConfig extends Model
{
    protected $fillable = ['name', 'endpoint', 'description'];

    public function predictions()
    {
        return $this->hasMany(Prediction::class);
    }
}
