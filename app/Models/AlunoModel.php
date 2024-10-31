<?php

namespace App\Models;

use CodeIgniter\Model;

class AlunoModel extends Model
{
    protected $table = 'alunos'; // Nome da tabela
    protected $primaryKey = 'id'; // Nome da chave primária

    protected $allowedFields = [
        'nome',      // Campos que podem ser inseridos ou atualizados
        'email',
        'password',
        'endereco',
        'telefone',
        'foto',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true; // Habilita timestamps automáticos
    protected $createdField = 'created_at'; // Campo de criação
    protected $updatedField = 'updated_at'; // Campo de atualização
}
