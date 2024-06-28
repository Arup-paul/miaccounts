<?php

namespace App\Service;

use App\Models\AccountHead;
use App\Models\Group;

class ReportService
{
   public function getQ1Report()
   {
       $groups = Group::with([
           'children.children.accountHeads.transactions',
           'accountHeads.transactions',
           'children.accountHeads.transactions'
       ])
           ->whereNull('parent_id')
           ->get();

      return  $reportData = $groups->map(function($group) {
           return $this->processGroup($group);
       });
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

        //sum amount
        foreach ($group->accountHeads as $accountHead) {
            $totalAmount = $accountHead->transactions->sum(function ($transaction) {
                return $transaction->debit - $transaction->credit;
            });

            $groupData['total_amount'] += $totalAmount;
            $groupData['children'][] = [
                'name' => $accountHead->name,
                'total_amount' => $totalAmount
            ];
        }



        return $groupData;
    }



    public function getQ2Report()
    {
        $accountHeads = AccountHead::with([
            'transactions',
            'group.parent.parent'
        ])->get();

        $reportData = [];
        foreach ($accountHeads as $accountHead) {
            $levels = $this->getGroupLevels($accountHead->group);
            $totalAmount = $accountHead->transactions->sum(function ($transaction) {
                return $transaction->debit - $transaction->credit;
            });

            $reportData[] = [
                'acc_head_id' => $accountHead->id,
                'lvl1' => $levels[0] ?? '',
                'lvl2' => $levels[1] ?? '',
                'lvl3' => $levels[2] ?? '',
                'acc_head' => $accountHead->name,
                'total' => $totalAmount
            ];
        }
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
