<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use App\Service\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(public ReportService $reportService) { }

    public function getQ1Report(){
       $reportData = $this->reportService->getQ1Report();
       return view('report.q1', compact('reportData'));
   }

    public function getQ2Report(){
        $reportData = $this->reportService->getQ2Report();
        return view('report.q2', compact('reportData'));
    }

}
