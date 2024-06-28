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
        try {
            $reportData = $this->reportService->getQ1Report();
            return view('report.q1', compact('reportData'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

   }

    public function getQ2Report(){
        try {
        $reportData = $this->reportService->getQ2Report(1);
        return view('report.q2', compact('reportData'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

}
