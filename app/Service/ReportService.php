<?php

namespace App\Service;

use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportService
{
   public function getQ1Report()
   {
       $accountSubQuery = function ($query) {
           $query->select(['account_heads.*'])
               ->leftJoin('transactions', 'account_heads.id', '=', 'transactions.account_head_id')
               ->selectRaw('account_heads.*, SUM(transactions.debit - transactions.credit) AS total_amount')
               ->groupBy('account_heads.id');
       };
       $groups = Group::with([
           'accountHeads' => $accountSubQuery,
           'children.accountHeads' => $accountSubQuery,
           'children.children.accountHeads' => $accountSubQuery,
       ])
           ->whereNull('parent_id')
            ->chunk(100, function($groups) use (&$reportData) {
               foreach ($groups as $group) {
                   $reportData[] = $this->processGroup($group);
               }
           });
       return $reportData;
   }


    public function processGroup($group)
    {
        $groupData = [
            'name' => $group->name,
            'total_amount' => 0,
            'children' => []
        ];

        //recursively
        foreach ($group->children as $childGroup) {
            $childGroupData = $this->processGroup($childGroup);
            $groupData['total_amount'] += $childGroupData['total_amount'];
            $groupData['children'][] = $childGroupData;
        }

        foreach ($group->accountHeads as $accountHead) {
            $totalAmount = $accountHead->total_amount ?? 0;

            $groupData['total_amount'] += $totalAmount;
            $groupData['children'][] = [
                'name' => $accountHead->name,
                'total_amount' => $totalAmount,
            ];
        }

        return $groupData;
    }



    public function getQ2Report()
    {
        $reportData = [];
        $accountHeads = AccountHead::with(['group.parent.parent'])
            ->leftJoin('transactions', 'account_heads.id', '=', 'transactions.account_head_id')
            ->selectRaw('account_heads.*, SUM(transactions.debit - transactions.credit) AS total_amount')
            ->groupBy('account_heads.id')
            ->chunk(5000, function($accountHeads) use (&$reportData) {
                foreach ($accountHeads as $accountHead) {
                    $levels = $this->getGroupLevels($accountHead->group);
                    $reportData[] = [
                        'acc_head_id' => $accountHead->id,
                        'lvl1' => $levels[0] ?? '',
                        'lvl2' => $levels[1] ?? '',
                        'lvl3' => $levels[2] ?? '',
                        'acc_head' => $accountHead->name,
                        'total' => $accountHead->total_amount
                    ];
                }
            });


        usort($reportData, function ($a, $b) {
            return strcmp($a['lvl1'], $b['lvl1']);
        });
        return $reportData;

    }


    public function getGroupLevels($group)
    {
        $levels = [];
        while ($group) {
            array_unshift($levels, $group->name);
            $group = $group->parent;
        }
        return $levels;
    }
}
