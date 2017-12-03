<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 24/11/2017
 * Time: 13:05
 */
declare(strict_types=1);
namespace SISFin\View;


use Psr\Http\Message\ResponseInterface;

interface ViewRendererInterface
{
    /**
     * @param string $templete
     * @param array  $context
     * @return ResponseInterface
     */
    public function render(string $template, array $context = []): ResponseInterface;
}