<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'cliente_id', 'funcionario_id', 'data', 'valor'];

    protected $table = 'Vendas';

    public function cliente(){
        return $this->belongsTo(Clientes::class, 'cliente_id');
    }

    public function funcionario(){
        return $this->belongsTo(Funionario::class, 'funcionario_id');
    }
}
