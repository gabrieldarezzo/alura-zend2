<?php

namespace Estoque\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Element\Csrf;
use Zend\Form\Form;

class ProdutoForm extends Form
{

    public function __construct(EntityManager $em)
    {
        parent::__construct('formProduto');

        $this->add([
            'type' => 'Text',
            'name' => 'nome',
            'id' => 'nome',
            'attributes' => [
                'placeholder' => 'Informe o nome',
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'type' => 'number',
            'name' => 'preco',
            'id' => 'preco',
            'attributes' => [
                'placeholder' => 'Informe o preço',
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'categoria',
            'id' => 'categoria',
            'options' => [
                'object_manager' => $em,
                'target_class' => 'Estoque\Entity\Categoria',
                'property' => 'nome',
                'empty_option' => 'Escolha uma categoria',
            ],
            'attributes' => [
                'class' => 'form-control',
            ],
        ]);

        $this->add([
            'type' => 'Textarea',
            'name' => 'descricao',
            'id' => 'descricao',
            'attributes' => [
                'placeholder' => 'Dê uma descrição',
                'class' => 'form-control',
                'cols' => '30',
                'rows' => '10',
            ],
        ]);

        $this->add(new Csrf('token_csrf'));

    }
}
