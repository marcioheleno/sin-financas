<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 24/11/2017
 * Time: 16:42
 */
declare(strict_types = 1);
namespace SISFin\Plugins;


use Illuminate\Database\Capsule\Manager as Capsule;
use Psr\Container\ContainerInterface;
use SISFin\Models\BillPay;
use SISFin\Models\BillReceive;
use SISFin\Models\CategoryCost;
use SISFin\Models\User;
use SISFin\Repository\CategoryCostRepository;
use SISFin\Repository\RepositoryFactory;
use SISFin\Repository\StatementRepository;
use SISFin\ServiceContainerInterface;

class DbPlugin implements PluginInterface
{

    public function register(ServiceContainerInterface $container)
    {
        $capsule = new Capsule();
        $config = include __DIR__ . '/../../config/db.php';
        $capsule->addConnection($config['default']);
        $capsule->bootEloquent();

        $container->add('repository.factory', new RepositoryFactory());

        $container->addLazy('category-cost.repository', function () {
            return new CategoryCostRepository();
        });

        $container->addLazy('bill-receive.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(BillReceive::class);
        });

        $container->addLazy('bill-pay.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(BillPay::class);
        });

        $container->addLazy('users.repository', function (ContainerInterface $container) {
            return $container->get('repository.factory')->factory(User::class);
        });

        $container->addLazy('statement.repository', function () {
            return new StatementRepository();
        });





    }
}