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

>> 
        SELECT id, zt.total, ref.total
                          FROM zones as z
                          LEFT JOIN (
                          	SELECT COUNT(*) as total, zone_id FROM institutions GROUP BY zone_id
                          ) as zt on zt.zone_id = z.id
                          LEFT JOIN (
                          	SELECT COUNT(ref.institution_id) as total, inst.zone_id as zone_id 
                              FROM institutions as inst
                              LEFT JOIN referrals as ref on ref.institution_id = inst.id
                              GROUP BY inst.zone_id
                          ) as ref on ref.zone_id = z.id;

        