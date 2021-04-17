<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert([
            [
                'rm_branch_id' => 'BDG',
                'rm_rep_id' => 'BD03177',
                'rm_name' => 'SHINTA DAMAYANTIE',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'JK03320'
            ],
            [
                'rm_branch_id' => 'PKB',
                'rm_rep_id' => 'PK00068',
                'rm_name' => 'NIA SEMARTIANA',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'JK03320'
            ],
            [
                'rm_branch_id' => 'BKS',
                'rm_rep_id' => 'BK00158',
                'rm_name' => 'FARAH AMALIA',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'BD03143'
            ],
            [
                'rm_branch_id' => 'BDG',
                'rm_rep_id' => 'BD03203',
                'rm_name' => 'ROBI ACHIRUDIN.S',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'BD03143'
            ],
            [
                'rm_branch_id' => 'JGY',
                'rm_rep_id' => 'JG00928',
                'rm_name' => 'SUSIAMI INDRIANI',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'PL00205'
            ],
            [
                'rm_branch_id' => 'MDN',
                'rm_rep_id' => 'MD00464',
                'rm_name' => 'SARAH PAMELA',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'PL00205'
            ],
            [
                'rm_branch_id' => 'SBY',
                'rm_rep_id' => 'SB01310',
                'rm_name' => 'HANATRI PUTRI MARATONI',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'SB01153'
            ],
            [
                'rm_branch_id' => 'TGR',
                'rm_rep_id' => 'TG00154',
                'rm_name' => 'YANA FEBRINA',
                'rm_current_position' => 'EPC',
                'rm_manager_id' => 'SB01153'
            ],
            [
                'rm_branch_id' => 'JKT',
                'rm_rep_id' => 'JK03320',
                'rm_name' => 'EDO APRIANTO',
                'rm_current_position' => 'GEPD',
                'rm_manager_id' => 'JK03320'
            ],
            [
                'rm_branch_id' => 'BDG',
                'rm_rep_id' => 'BD03143',
                'rm_name' => 'NUR ISLAMI Y LUTHFIATI',
                'rm_current_position' => 'EPD',
                'rm_manager_id' => 'JK03320'
            ],
            [
                'rm_branch_id' => 'PLB',
                'rm_rep_id' => 'PL00205',
                'rm_name' => 'FITRI HANDAYANI',
                'rm_current_position' => 'EPD',
                'rm_manager_id' => 'JK03320'
            ],
            [
                'rm_branch_id' => 'SBY',
                'rm_rep_id' => 'SB01153',
                'rm_name' => 'MARIA LUAILIA',
                'rm_current_position' => 'GEPD',
                'rm_manager_id' => 'SB01153'
            ],
        ]);
    }
}
