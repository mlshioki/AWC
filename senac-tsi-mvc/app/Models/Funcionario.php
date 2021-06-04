<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model{
    use HasFactory;

    protected $fillable = [ 'id', 'nome', 'endereco', 'email', 'telefone'];

    protected $table = 'Funcionario';

    /* Como mudar a chave primária:
    protected $primaryKey = 'nome-desejado';

    Deixar de ser auto increment:
    public $increment = false;

    Para definir tipo:
    protected $keyType = 'string';

    Para retirar campos timestamps:
    public $timestamps = false;
    */
}
