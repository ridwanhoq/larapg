>> 
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

>> need count with 0 values