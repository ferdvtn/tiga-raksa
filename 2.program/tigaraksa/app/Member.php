<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    public $primaryKey  = 'rm_rep_id';

    /**
     * 
     * Get hierarcy list report by 'rm_current_position'
     * 
     * @return object
     * 
     */
    public static function getReports()
    {
        return DB::table('members as m1')
                ->select('m3.rm_rep_id as rm_mst_gepd', 'm3.rm_name as NamaGEPD', 'm2.rm_rep_id as rm_mst_epd', 'm2.rm_name as NamaEPD', 'm1.rm_branch_id', 'm1.rm_name', 'm1.rm_rep_id as rm_mst_epc')
                ->join('members as m2', 'm1.rm_manager_id', '=', 'm2.rm_rep_id')
                ->join('members as m3', 'm2.rm_manager_id', '=', 'm3.rm_rep_id')
                ->where('m1.rm_current_position', '=', 'EPC')
                ->orderBy('m3.rm_name', 'asc')
                ->get();
    }

    public static function getDetail($rmRepId)
    {
        return DB::table('members as m1')
                ->select('m3.rm_rep_id as rm_mst_gepd', 'm3.rm_name as NamaGEPD', 'm2.rm_rep_id as rm_mst_epd', 'm2.rm_name as NamaEPD', 'm1.*')
                ->join('members as m2', 'm1.rm_manager_id', '=', 'm2.rm_rep_id')
                ->join('members as m3', 'm2.rm_manager_id', '=', 'm3.rm_rep_id')
                ->where('m1.rm_rep_id', '=', $rmRepId)
                ->orderBy('m3.rm_name', 'asc')
                ->first();
    }

    /**
     * 
     * Get list option EPD & GEPD distict
     * 
     * @return object
     * 
     */
    public static function getManagerOptions()
    {
        // Just only EPD and GEPD positions could be managers
        return DB::table('members')->select(['rm_rep_id', 'rm_name', 'rm_current_position'])->whereIn('rm_current_position', ['EPD', 'GEPD'])->orderByDesc('rm_current_position')->distinct()->get();
    }
}
