<?php

namespace App\Exports;

use DB;
use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;


class EmployeesExport implements FromQuery, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

      //return Employee::select('nip','nama_lengkap','status_pns');

      // $employee = Employee::select('nip','nama_lengkap','status_pns','formasi_jabatan')->get();
      // return Excel::create('data_pegawai', function($excel) use ($employee){
      //     $excel->sheet('mysheet', function($sheet) use ($employee){
      //       $sheet->fromArray($employee);
      //     });
      // });


      return Employee::select('employees.nip','employees.nama_lengkap',DB::raw('CASE WHEN employees.status_pns = "1" THEN "PNS" ELSE "TTPK" END'),'units.nama_unit','employees.formasi_jabatan')
      ->join('units', 'employees.kode_unit_kerja','=','units.id');
    }

    public function headings(): array
    {

      return [
        'NIP',
        'NAMA LENGKAP',
        'STATUS PEGAWAI',
        'UNIT KERJA',
        'JABATAN'
      ];
    }
}
