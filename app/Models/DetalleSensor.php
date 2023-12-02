<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSensor extends Model
{
    use HasFactory;

    protected $table = 'detalle_sensor';

    protected $primaryKey = ['vitrina_id', 'sensor_id'];

    public $incrementing = false;

    protected $fillable = [
        'vitrina_id',
        'sensor_id',
        'valor_sensor',
        'fecha_hora',
    ];

    protected $casts = [
        'fecha_hora' => 'datetime',
    ];

    public function vitrina()
    {
        return $this->belongsTo(Vitrina::class, 'vitrina_id', 'id');
    }

    public function sensor()
    {
        return $this->belongsTo(Sensor::class, 'sensor_id', 'id');
    }
}
