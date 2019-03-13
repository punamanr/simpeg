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
        'units.nama_unit','positions.nama_jabatan',DB::raw('MAX(educations.jenjang_pendidikan) as pendidikan'),'employees.alamat',DB::raw('CONCAT(" RT ",employees.rt) as rt'),
        DB::raw('CONCAT(" RW ",employees.rw) as rw'), DB::raw('CONCAT(" Desa ",employees.kelurahan_desa) as kelurahan_desa'),
        DB::raw('CONCAT(" Kecamatan ",employees.kecamatan) as kecamatan'))
      ->join('units', 'employees.kode_unit_kerja','=','units.id')
      ->join('positions', 'employees.kode_jabatan_unit_kerja','=','positions.kode_jabatan')
      ->leftJoin('educations', 'employees.nip', '=', 'educations.nip_employee')
      ->groupBy('employees.nip','employees.nama_lengkap','positions.nama_jabatan','employees.status_pns','units.nama_unit','employees.kecamatan','employees.kelurahan_desa','employees.rw',
        'employees.rt','employees.alamat')
      ->orderByRaw('nip ASC');

    }

    public function map($employee): array
    {
      return [
        $employee->nip,
        $employee->nama_lengkap,
        $employee->nama_unit,
        $employee->nama_jabatan,
        $employee->pendidikan,
        $employee->status,
        $employee->alamat.$employee->rt.$employee->rw.$employee->kelurahan_desa.$employee->kecamatan,
      ];
    }

    public function headings(): array
    {

      return [
        'NIP / NIPK',
        'NAMA LENGKAP',
        'UNIT KERJA',
        'JABATAN',
        'PENDIDIKAN TERAKHIR',
        'STATUS PEGAWAI',
        'ALAMAT',
      ];
    }
}
