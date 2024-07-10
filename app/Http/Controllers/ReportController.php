<?php

namespace App\Http\Controllers;

use App\Models\AccountHead;
use App\Models\Group;
use App\Models\Transaction;
use App\Service\ReportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct(public ReportService $reportService) { }

    public function getQ1Report(){
        try {
            $cacheKey = 'q1_report_data';
            if (Cache::has($cacheKey)) {
                $reportData =  Cache::get($cacheKey);
            }else{
                $reportData = $this->reportService->getQ1Report();
                //store cache data
                Cache::put($cacheKey, $reportData, now()->addMinutes(10));
            }
            return view('report.q1', compact('reportData'));
        }catch (\Exception $exception){
            return $exception->getMessage();
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }

   }

    public function getQ2Report(){
        try {
            $cacheKey = 'q2_report_data';
            if (Cache::has($cacheKey)) {
                $reportData =  Cache::get($cacheKey);
            }else{
                $reportData = $this->reportService->getQ2Report();
                //store cache data
                Cache::put($cacheKey, $reportData, now()->addMinutes(10));
            }

        return view('report.q2', compact('reportData'));
        }catch (\Exception $exception){
            return redirect()->back()->withErrors([$exception->getMessage()]);
        }
    }

}
