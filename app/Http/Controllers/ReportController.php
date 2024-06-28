<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
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

       $reportData = $groups->map(function($group) {
           return $this->processGroup($group);
       });

       return view('report.q1', compact('reportData'));
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




}
