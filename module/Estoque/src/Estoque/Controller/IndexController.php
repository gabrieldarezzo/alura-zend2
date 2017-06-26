<?php

namespace Estoque\Controller;

use Estoque\Entity\Produto;
use Estoque\Form\ProdutoForm;
use Zend\Mail\Message;
use Zend\Mail\Transport\Smtp as SmtpTransport;
use Zend\Mail\Transport\SmtpOptions;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Part as MimePart;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $repositorio = $entityManager->getRepository('Estoque\Entity\Produto');
        $produtos = $repositorio->findAll();

        return array(
            'produtos' => $produtos
        );
	}

    public function cadastrarAction()
    {
        //$uri = $this->getRequest()->getUri();
        //$base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost()) . '/zend2_estudos/';
        //print $this->basePath();die();




        if($this->request->isPost()){
            $produto = new Produto();

            $nome = $this->request->getPost('nome');
            $preco = $this->request->getPost('preco');
            $descricao = $this->request->getPost('descricao');

            $produto->setNome($nome);
            $produto->setPreco($preco);
            $produto->setDescricao($descricao);

            $entityManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
            $entityManager->persist($produto);
            $entityManager->flush();

        }
        return new ViewModel();

    }
 

}
