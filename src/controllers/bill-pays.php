<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 29/11/2017
 * Time: 15:47
 */

use Psr\Http\Message\ServerRequestInterface;

$app
    ->get(
        '/bill-pays', function () use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('bill-pay.repository');
            $auth = $app->service('auth');
            $billPays = $repository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'bill-pays/list.html.twig', [
                'billPays' => $billPays
                ]
            );
        }, 'bill-pays.list'
    )

    // list db
    ->get(
        '/bill-pays/new', function () use ($app) {
            $view = $app->service('view.renderer');
            $auth = $app->service('auth');
            $categoryRepository = $app->service('category-cost.repository');
            $categories = $categoryRepository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'bill-pays/create.html.twig', [
                'categories' => $categories
                ]
            );
        }, 'bill-pays.new'
    )

    // create -> dataBase
    ->post(
        '/bill-pays/store', function (ServerRequestInterface $request) use ($app) {
            $data = $request->getParsedBody();
            $repository = $app->service('bill-pay.repository');
            $categoryRepository = $app->service('category-cost.repository');
            $auth = $app->service('auth');
            $data['user_id'] = $auth->user()->getId();
            $data['date_launch'] = dateParse($data['date_launch']);
            $data['value'] = numberParse($data['value']);
            $data['category_cost_id'] = $categoryRepository->findOneBy(
                [
                'id' => $data['category_cost_id'],
                'user_id' => $auth->user()->getId()
                ]
            )->id;
            $repository->create($data);
            return $app->route('bill-pays.list');
        }, 'bill-pays.store'
    )

    // update -> dataBase
    ->get(
        '/bill-pays/{id}/edit', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('bill-pay.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $bill = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            $categoryRepository = $app->service('category-cost.repository');
            $categories = $categoryRepository->findByField('user_id', $auth->user()->getId());
            return $view->render(
                'bill-pays/edit.html.twig', [
                'bill' => $bill,
                'categories' => $categories
                ]
            );
        }, 'bill-pays.edit'
    )

    ->post(
        '/bill-pays/{id}/update', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('bill-pay.repository');
            $categoryRepository = $app->service('category-cost.repository');
            $id = $request->getAttribute('id');
            $data = $request->getParsedBody();
            $auth = $app->service('auth');
            $date['user_id'] = $auth->user()->getId();
            $data['date_launch'] = dateParse($data['date_launch']);
            $data['value'] = numberParse($data['value']);
            $data['category_cost_id'] = $categoryRepository->findOneBy(
                [
                'id' => $data['category_cost_id'],
                'user_id' => $auth->user()->getId()
                ]
            )->id;
            $repository->update(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ], $data
            );
            return $app->route('bill-pays.list');
        }, 'bill-pays.update'
    )

    // show view bill
    ->get(
        '/bill-pays/{id}/show', function (ServerRequestInterface $request) use ($app) {
            $view = $app->service('view.renderer');
            $repository = $app->service('bill-pay.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $bill = $repository->findOneBy(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $view->render(
                'bill-pays/show.html.twig', [
                'bill' => $bill
                ]
            );
        }, 'bill-pays.show'
    )

    // delete route
    ->get(
        '/bill-pays/{id}/delete', function (ServerRequestInterface $request) use ($app) {
            $repository = $app->service('bill-pay.repository');
            $id = $request->getAttribute('id');
            $auth = $app->service('auth');
            $repository->delete(
                [
                'id' => $id,
                'user_id' => $auth->user()->getId()
                ]
            );
            return $app->route('bill-pays.list');
        }, 'bill-pays.delete'
    );