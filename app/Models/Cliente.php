<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table = "clientes";
    protected $fillable = [
        'nome',
        'apelido',
        'email',
        'user_id',
        'email',
        'aniversario',
        'validade',
        'bi',
        'nuit',
        'telefone_1',
        'telefone_2',
    ];
    public function emprestimos()
    {
        return $this->hasMany(Emprestimo::class);
    }
}
