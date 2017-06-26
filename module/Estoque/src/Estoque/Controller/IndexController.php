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

       return new ViewModel();

    }
 

}
