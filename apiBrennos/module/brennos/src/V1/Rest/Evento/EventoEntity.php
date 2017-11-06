<?php
namespace brennos\V1\Rest\Evento;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Vaguinho
 * @category Core
 * @package Entity
 * @ORM\Entity
 * @ORM\Table(name="evento")
 */

class EventoEntity
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer")
     * @var integer
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=false, length=300)
     * @var String
     */
    protected $nome;

    /**
     * @ORM\Column(type="string", nullable=false, length=30000)
     * @var String
     */
    protected $foto_perfil;
    /**
     * @ORM\Column(type="date", nullable=false, length=300)
     * @var Date
     */
    protected $date;
    /**
     * @ORM\Column(type="string", nullable=false, length=500)
     * @var String
     */
    protected $descricao;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param String $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return String
     */
    public function getFotoPerfil()
    {
        return $this->foto_perfil;
    }

    /**
     * @param String $foto_perfil
     */
    public function setFotoPerfil($foto_perfil)
    {
        $this->foto_perfil = $foto_perfil;
    }

    /**
     * @return Date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param Date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return String
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param String $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function getArrayCopy (){
        return array(
            'id' => $this->id,
            'nome' => $this->nome,
            'foto_perfil' => $this->foto_perfil,
            'data' => $this->data,
            'descricao' => $this->descricao

        );
    }

    public function exchangeArray( array $array){
        $this->id = $array['id'];
        $this->nome = $array['nome'];
        $this->foto_perfil = $array['foto_perfil'];
        $this->data = $array['data'];
        $this->descricao = $array['descricao'];
    }
}
