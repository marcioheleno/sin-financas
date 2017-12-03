<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 02/12/2017
 * Time: 12:12
 */
declare(strict_types=1);


namespace SISFin\Repository;


use SISFin\Models\CategoryCost;

class CategoryCostRepository extends DefaultRepository implements CategoryCostsRepositoryInterface
{


    /**
     * CategoryCostRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(CategoryCost::class);
    }

    public function sumByPeriod(string $dateStart, string $dateEnd, int $userId): array
    {
        $categories = CategoryCost::query()
            ->selectRaw('category_costs.name, sum(value) as value')
            ->leftJoin('bill_pays', 'bill_pays.category_cost_id', '=', 'category_costs.id')
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('category_costs.user_id', $userId)
            ->whereNotNull('bill_pays.category_cost_id')
            ->groupBy('value')
            ->groupBy('category_costs.name')
            ->get();

        return $categories->toArray();
    }
}