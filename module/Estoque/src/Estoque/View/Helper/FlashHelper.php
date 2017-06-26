<?php

namespace Estoque\View\Helper;

use Zend\View\Helper\AbstractHelper;

class FlashHelper extends AbstractHelper
{
    public function __invoke()
    {
        echo $this->view->flashMessenger()->render('default', ['alert', 'alert-info', 'list-unstyled']);
        echo $this->view->flashMessenger()->render('info', ['alert', 'alert-info', 'list-unstyled']);
        echo $this->view->flashMessenger()->render('success', ['alert', 'alert-success', 'list-unstyled']);
        echo $this->view->flashMessenger()->render('warning', ['alert', 'alert-warning', 'list-unstyled']);
        echo $this->view->flashMessenger()->render('error', ['alert', 'alert-danger', 'list-unstyled']);
    }
}
