<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaVitrina extends Model
{
    use HasFactory;

    protected $table = 'empresa_vitrina';

    protected $primaryKey = ['empresa_id', 'vitrina_id'];

    public $incrementing = false;

    protected $fillable = [
        'empresa_id',
        'vitrina_id',
    ];

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id', 'id');
    }

    public function vitrina()
    {
        return $this->belongsTo(Vitrina::class, 'vitrina_id', 'id');
    }
}
