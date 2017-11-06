<?php
namespace brennos\V1\Rest\Evento;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class EventoResource extends AbstractResourceListener
{

    protected $mapper;

    public function __construct( $mapper ){
        $this->mapper = $mapper;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $eventoEntity = new EventoEntity();

        $eventoEntity->setNome($data->nome);
        $eventoEntity->setFotoPerfil($data->foto_perfil);
        $eventoEntity->setDate($data->date);
        $eventoEntity->setDescricao($data->descricao);

        return $this->mapper->save($eventoEntity);
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        if($this->mapper->delete($id)) {
            return true;
        }
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        return $this->mapper->fetchOne($id);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        return $this->mapper->fetchAll();
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $eventoEntity = new EventoEntity();

        $eventoEntity->setId($id);
        $eventoEntity->setNome($data->nome);
        $eventoEntity->setFotoPerfil($data->foto_perfil);
        $eventoEntity->setDate($data->date);
        $eventoEntity->setDescricao($data->descricao);

        return $this->mapper->update($eventoEntity);
    }
}
