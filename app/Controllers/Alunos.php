<?php

namespace App\Controllers;

use App\Models\AlunosModel; // Certifique-se de criar o model correspondente
use CodeIgniter\RESTful\ResourceController;

class Alunos extends ResourceController
{
    protected $modelName = AlunosModel::class; // O modelo que você usará
    protected $format = 'json'; // Formato de resposta padrão

    public function index()
    {
        $alunos = $this->model->findAll(); // Recupera todos os alunos
        return $this->respond($alunos); // Retorna os alunos em formato JSON
    }

    public function show($id = null)
    {
        $aluno = $this->model->find($id); // Recupera um aluno específico
        if ($aluno) {
            return $this->respond($aluno); // Retorna o aluno em formato JSON
        }
        return $this->failNotFound('Aluno não encontrado'); // Mensagem de erro
    }

    public function create()
    {
        $data = $this->request->getPost(); // Obtém os dados da requisição
        if ($this->model->insert($data)) { // Tenta inserir os dados
            return $this->respondCreated(['id' => $this->model->insertID(), 'message' => 'Aluno criado com sucesso']);
        }
        return $this->fail('Falha ao criar aluno');
    }

    public function update($id = null)
    {
        $data = $this->request->getRawInput(); // Obtém os dados da requisição
        if ($this->model->update($id, $data)) { // Tenta atualizar os dados
            return $this->respond(['message' => 'Aluno atualizado com sucesso']);
        }
        return $this->fail('Falha ao atualizar aluno');
    }

    public function delete($id = null)
    {
        if ($this->model->delete($id)) { // Tenta deletar o aluno
            return $this->respondDeleted(['message' => 'Aluno deletado com sucesso']);
        }
        return $this->failNotFound('Aluno não encontrado');
    }
}
