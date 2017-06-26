<?php

namespace Estoque\View\Helper;

use Zend\View\Helper\AbstractHelper;

class PaginationHelper extends AbstractHelper
{

    private $url;
    private $totalProdutos;
    private $qtdPagina;

    public function __invoke($produtos, $qtdPagina, $url)
    {
        $this->url = $url;
        $this->totalProdutos = $produtos->count();
        $this->qtdPagina = $qtdPagina;

        return $this->gerarPaginacao();
    }

    public function gerarPaginacao()
    {
        $totalPaginas = ceil($this->totalProdutos / $this->qtdPagina);

        if ($totalPaginas === 1) {
            return;
        }
        $html = '<ul class="nav nav-pills">';

        for ($i = 1; $i <= $totalPaginas; $i++) {
            $html .= '<li><a href="' . $this->url . '/' . $i . '">' . $i . '</a></li>';
        }

        $html .= '</ul>';

        return $html;
    }
}
