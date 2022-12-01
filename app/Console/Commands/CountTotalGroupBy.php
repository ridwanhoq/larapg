<?php

namespace App\Console\Commands;

use App\Http\Controllers\CountTotalGroupByController;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CountTotalGroupBy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'count_total:group_by_check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        // CountTotalGroupByController::class;
        $firstDateoflastMonth = "2022-11-01";
        $lastDateoflastMonth = "2022-11-30";


        $programStudent = DB::table('referrals')
                                ->whereBetween('date', [$firstDateoflastMonth, $lastDateoflastMonth])
                                ->join('institutions','referrals.institution_id','institutions.id')
                                ->leftJoin('zones','institutions.zone_id','institutions.id')
                                ->select('referrals.*','institutions.*')
                                ->groupByRaw('zone_id')
                                ->select(
                                        DB::raw('COUNT(*) as participateTotal')
                                        // ,
                                        // DB::raw("SUM(CASE WHEN gender = 'Boy' THEN 1 ELSE 0 END) AS participateBoy"),
                                        // DB::raw("SUM(CASE WHEN gender = 'Girl' THEN 1 ELSE 0 END) AS participateGirl"),
                                )
                                ->get();
                                    // dd('test');
        dd($programStudent);
    }

}
