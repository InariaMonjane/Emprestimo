<?php

namespace App\Http\Controllers;

use App\Models\Contabilidade;
use Illuminate\Http\Request;

class ContabilidadeController extends Controller
{
    public function index(){
        //$registos = Contabilidade::select()->orderByDesc('id')->get();
        $registos = Contabilidade::all();
        return view('contabilidade.index', compact('registos'));
    }
}