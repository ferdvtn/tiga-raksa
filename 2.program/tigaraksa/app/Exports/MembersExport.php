<?php

namespace App\Exports;

use App\Member;
use Illuminate\Support\Facades\Schema;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembersExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        $fields = [];
        foreach (Member::getReports()->first() as $field => $value) {
            $fields[] = strtoupper($field);
        }

        return $fields;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Member::getReports();
    }
}
