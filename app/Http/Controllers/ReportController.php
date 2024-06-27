<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
   public function getQ1Report()
   {
       $reportData = [];
       return view('report.q1', compact('reportData'));
   }



}
