<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'numero',
        'valor',
        'data_emissao',
        'cnpj_remetente',
        'nome_remetente',
        'cnpj_transportador',
        'nome_transportador'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
