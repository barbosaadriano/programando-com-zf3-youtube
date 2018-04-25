<?php

namespace Pessoa\Model;

use Zend\Db\TableGateway\TableGatewayInterface;
use RuntimeException;

class PessoaTable {

    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway) {
        $this->tableGateway = $tableGateway;
    }

    public function getAll() {
        return $this->tableGateway->select();
    }

    public function getPessoa($id) {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);
        $row = $rowset->current();
        if (!$row) {
            throw new RuntimeException(sprintf('Não foi encontrado o id %d', $id));
        }
        return $row;
    }

    public function salvarPessoa(Pessoa $pessoa) {
        $data = [
            'nome' => $pessoa->getNome(),
            'sobrenome' => $pessoa->getSobrenome(),
            'email' => $pessoa->getEmail(),
            'situacao' => $pessoa->getSituacao(),
        ];

        $id = (int) $pessoa->getId();
        if ($id === 0) {
            $this->tableGateway->insert($data);
            return;
        }
        $this->tableGateway->update($data, ['id' => $id]);
    }

    public function deletarPessoa($id) {
        $this->tableGateway->delete(['id' => (int) $id]);
    }

}
