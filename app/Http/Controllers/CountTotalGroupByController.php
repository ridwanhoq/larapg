<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CountTotalGroupByController extends Controller
{
    public function index()
    {
        $firstDateoflastMonth = "2022-11-01";
        $lastDateoflastMonth = "2022-11-30";

        $programStudent = DB::table('referrals')
                                ->whereBetween('date',[$firstDateoflastMonth,$lastDateoflastMonth])
                                ->join('institutions','referrals.institution_id','institutions.id')
                                ->leftJoin('zones','institutions.zone_id','institutions.id')
                                ->select('referrals.*','institutions.*')
                                ->groupByRaw('zone_id')
                                ->select(
                                        DB::raw('COUNT(*) as participateTotal'),
                                        DB::raw("SUM(CASE WHEN gender = 'Boy' THEN 1 ELSE 0 END) AS participateBoy"),
                                        DB::raw("SUM(CASE WHEN gender = 'Girl' THEN 1 ELSE 0 END) AS participateGirl"),
                                )
                                ->get();
                                    dd('test');
        return $programStudent;


    }
}
