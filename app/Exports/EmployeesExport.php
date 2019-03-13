<?php

namespace App\Exports;

use DB;
use App\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromQuery,  WithHeadings, WithMapping//, WithEvents
{
    use Exportable;

    // public function registerEvents(): array
    // {

    //   $styleArray = [
    //     'font' => [
    //       'bold' => true,
    //     ]
    //   ];

    //   return [

    //     BeforeSheet::class => function(BeforeSheet $event) use ($styleArray) {
    //       $event->sheet->setCellValue('A1','Hello');
    //     },

    //     AfterSheet::class => function (AfterSheet $event) use ($styleArray) {
    //       $event->sheet->getStyle('A1:E1')->applyFromArray($styleArray);
    //     },
    //   ];
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {

      return Employee::select('employees.nip','employees.nama_lengkap',DB::raw('CASE WHEN employees.status_pns = "1" THEN "PNS" ELSE "TTPK" END as status'),
        'units.nama_unit','employees.formasi_jabatan','employees.alamat',DB::raw('CONCAT(" RT ",employees.rt) as rt'),DB::raw('CONCAT(" RW ",employees.rw) as rw'),
        DB::raw('CONCAT(" Desa ",employees.kelurahan_desa) as kelurahan_desa'),DB::raw('CONCAT(" Kecamatan ",employees.kecamatan) as kecamatan'))
      ->join('units', 'employees.kode_unit_kerja','=','units.id')
      ->orderByRaw('nip ASC');
    }

    public function map($employee): array
    {
      return [
        $employee->nip,
        $employee->nama_lengkap,
        $employee->status,
        $employee->nama_unit,
        $employee->formasi_jabatan,
        $employee->alamat.$employee->rt.$employee->rw.$employee->kelurahan_desa.$employee->kecamatan,
      ];
    }

    public function headings(): array
    {

      return [
        'NIP',
        'NAMA LENGKAP',
        'STATUS PEGAWAI',
        'UNIT KERJA',
        'JABATAN',
        'ALAMAT',
      ];
    }
}
