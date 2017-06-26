<?php

namespace Estoque\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Tools\Export\ExportException;

/**
 * @ORM\Entity
 */
class Produto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $nome;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $preco;

    /**
     * @ORM\Column(type="text")
     */
    private $descricao;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @return decimal
     */
    public function getPreco()
    {
        return $this->preco;
    }

    /**
     * @return string
     */
    public function getDescricao()
    {
        return $this->descricao;
    }









  
}
