<?php
/**
 * Created by PhpStorm.
 * User: oicram
 * Date: 30/11/2017
 * Time: 11:44
 */
declare(strict_types=1);

namespace SISFin\Repository;

use Illuminate\Support\Collection;
use SISFin\Models\BillPay;
use SISFin\Models\BillReceive;


/**
 * Class StatementRepository
 *
 * @package SISFin\Repository
 */
class StatementRepository implements StatementRepositoryInterface
{


    /**
     * @param string $dateStart
     * @param string $dateEnd
     * @param int    $userId
     * @return array
     */
    public function all(string $dateStart, string $dateEnd, int $userId): array
    {
        $billPays = BillPay::query()
            ->selectRaw('bill_pays.*, category_costs.name as category_name')
            ->leftJoin('category_costs', 'category_costs.id', '=', 'bill_pays.category_cost_id')
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('bill_pays.user_id', $userId)
            ->get();

        $billReceives = BillReceive::query()
            ->whereBetween('date_launch', [$dateStart, $dateEnd])
            ->where('user_id', $userId)
            ->get();

        $collection = new Collection(array_merge_recursive($billPays->toArray(), $billReceives->toArray()));
        $statements = $collection->sortByDesc('date_launch');
        return [
            'statements' => $statements,
            'total_pays' => $billPays->sum('value'),
            'total_receives' => $billReceives->sum('value'),
        ];
    }
}