<?php
/**
 * Created by PhpStorm.
 * User: vaguinho
 * Date: 23/10/17
 * Time: 11:23
 */

namespace brennos\V1\Rest\Evento;

use Zend\Db\TableGateway\TableGateway;
use ZF\ApiProblem\ApiProblem;

class EventoMapper
{
    protected $tableGateway;

    public function __construct( TableGateway $tableGateway ){
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }

    public function fetchOne($id)
    {
        $id = (int) $id;
        $rowset = $this->tableGateway->select(['id' => $id]);

        $row = $rowset->current();

        return $row;
    }

    public function save(EventoEntity $evento)
    {
        $data = [

            'nome' => $evento->getNome(),
            'foto_perfil' => $evento->getFotoPerfil(),
            'date' => $evento->getDate(),
            'descricao' => $evento->getDescricao()

        ];

        $id = (int) $evento->getId();
        var_dump($id);

        if(!$this->fetchOne($id)){
            $evento = $this->tableGateway->insert($data);
            $evento = $this->tableGateway->lastInsertValue;

            return $evento;
        } else {
            return new ApiProblem(208, 'usuário ja cadastrado');
        }

    }

    public function update(EventoEntity $evento){

        $id = (int) $evento->getId();

        $data = [

            'id' => $evento->getId(),
            'nome' => $evento->getNome(),
            'foto_perfil' => $evento->getFotoPerfil(),
            'date' => $evento->getDate(),
            'descricao' => $evento->getDescricao()

        ];
        if($this->fetchOne($id)){
            $this->tableGateway->update($data, ['id' => $id]);
            return $evento;
        }
    }

    public function delete ($id){
        return $this->tableGateway->delete(['id' => (int) $id]);
    }

}