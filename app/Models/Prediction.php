<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediction extends Model
{
    protected $fillable = [
        'user_id',
        'api_config_id',
        'type',
        'result_summary',
        'image_path',
        'manual_name',
        'manual_surname',
        'manual_age',
        'manual_smokes',
        'manual_areaq',
        'manual_alkhol'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function apiConfig()
    {
        return $this->belongsTo(ApiConfig::class);
    }

    public function predictionResults()
    {
        return $this->hasMany(PredictionResult::class);
    }
}
