<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 24/11/2017
 * Time: 13:10
 */

namespace SISFin\View;


use Psr\Http\Message\ResponseInterface;
use Twig_Environment;
use Zend\Diactoros\Response;


class ViewRenderer implements ViewRendererInterface
{

    private $twigEnvironment;
    /**
     * ViewRenderer constructor.
     */
    public function __construct(Twig_Environment $twigEnvironment)
    {
        $this->twigEnvironment = $twigEnvironment;
    }


    /**
     * @param string $templete
     * @param array  $context
     * @return ResponseInterface
     */
    public function render(string $template, array $context = []): ResponseInterface
    {
        $result = $this->twigEnvironment->render($template, $context);
        $response = new Response();
        $response->getBody()->write($result);
        return $response;
    }
}