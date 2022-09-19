<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'descricao',
        'maximo_alunos',
        'preco'
    ];

    protected $casts = [
        'nome' => 'string',
        'descricao' => 'string',
        'maximo_alunos' => 'integer',
        'preco' => 'float'
    ];
}
