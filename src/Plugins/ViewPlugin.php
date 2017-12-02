<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 24/11/2017
 * Time: 12:27
 */
declare(strict_types=1);
namespace SISFin\Plugins;


use Psr\Container\ContainerInterface;
use SISFin\ServiceContainerInterface;
use SISFin\View\Twig\TwigGlobals;
use SISFin\View\ViewRenderer;
use Twig_Environment;
use Twig_Loader_Filesystem;
use Twig_SimpleFunction;

class ViewPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $container->addLazy('twig', function (ContainerInterface $container) {
            $loader = new Twig_Loader_Filesystem(__DIR__ . '/../../templates');
            $twig = new Twig_Environment($loader);

            $auth = $container->get('auth');

            $generator = $container->get('routing.generator');
            $twig->addExtension(new TwigGlobals($auth));
            $twig->addFunction(new Twig_SimpleFunction('route',
                function (string $name, array $params = []) use($generator) {
                    return $generator->generate($name, $params);
                })
            );
            return $twig;
        });

        $container->addLazy('view.renderer', function (ContainerInterface $container) {
            $twigEnviroment = $container->get('twig');
            return new ViewRenderer($twigEnviroment);
        });
    }


}