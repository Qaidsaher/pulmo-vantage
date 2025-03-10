<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PredictionResult extends Model
{
    protected $fillable = ['prediction_id', 'model_name', 'result_detail', 'confidence','image_path'];

    public function prediction()
    {
        return $this->belongsTo(Prediction::class);
    }
}
