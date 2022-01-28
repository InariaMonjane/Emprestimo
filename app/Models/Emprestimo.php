<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emprestimo extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }
    public function prestacoes()
    {
        return $this->hasMany(Prestacao::class);
    }
    public function getActualAttribute()
    {
        $prestacao = Prestacao::where('emprestimo_id', $this->attributes['id'])->where('estado', 'Pendente')->first();
        return $prestacao;
    }
    public function getTotalAttribute()
    {
        $prestoes = Prestacao::where('emprestimo_id', $this->attributes['id'])->get();
        return $prestoes->sum('juros');
    }
    public function getSaldoactalAttribute()
    {
        $prestoes = Prestacao::where('emprestimo_id', $this->attributes['id'])->get();
        return $prestoes->sum('juros');
    }
    public function getSaldoanteriorAttribute()
    {
        $pagamentos = Prestacao::where('emprestimo_id', $this->attributes['id'])->where('estado', 'Pago')->get();
        return $pagamentos->sum('opcao1');
    }
}
