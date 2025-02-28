<?php

namespace App\Exports;

use App\Models\students;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return students::all();

        return students::select("id", "name", "mobile","mobile2","gender","fname","mname","id_no","join_date","class","term","student_level")->get();
    }


    public function headings(): array
    {
        return ["ID", "Name", "Mobile","Mobile2","Gender","father_name","mother_name","id_no","join_date","class","term","student_level"];
    }




}
