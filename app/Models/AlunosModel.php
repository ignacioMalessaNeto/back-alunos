<?php

namespace App\Models;

use CodeIgniter\Model;

class AlunosModel extends Model
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
    ];

    protected $useTimestamps = true; // Habilita timestamps automáticos
    protected $createdField = 'created_at'; // Campo de criação
    protected $updatedField = 'updated_at'; // Campo de atualização

    protected $validationRules = [
        'nome' => 'required|min_length[3]|max_length[255]',
        'email' => 'required|valid_email|is_unique[alunos.email]',
        'password' => 'required|min_length[6]',
        'telefone' => 'permit_empty|max_length[255]',
        'endereco' => 'permit_empty|max_length[255]',
    ];

    protected $validationMessages = [
        'email' => [
            'is_unique' => 'Esse email já está em uso.',
        ],
    ];
}
