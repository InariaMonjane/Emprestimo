<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateTimeZone;

class Prestacao extends Model
{
    use HasFactory;

    public function emprestimo()
    {
        return $this->belongsTo(Emprestimo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAtrasoAttribute()
    { 
        $now = new DateTime("now", new DateTimeZone("Africa/Harare"));
        $prestacao = Prestacao::find($this->attributes['id']);
        $dataPrevista = new DateTime($prestacao->dataPrevista, new DateTimeZone("Africa/Harare"));
        $diferenca = date_diff($dataPrevista, $now);
        $data = explode('-', $prestacao->dataPrevista);
        if ($data[1] === date('m')) {
            return  date('d') - $data[2];
        }elseif ($data[1] < date('m')){
            return  $diferenca->days;
        }else{
            return 0 - $diferenca->days;
        }   
    }
    
    public function getMultaAttribute()
    {
        if($this->getAtrasoAttribute() <= 0){
            return 0;
        }else{
            return $this->getAtrasoAttribute();
        }
    }
    
}
