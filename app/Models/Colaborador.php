<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;
    public function login()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function filiacao()
    {
        return $this->belongsTo('App\Models\Filiacao', 'filiacao_id', 'id');
    }
}
