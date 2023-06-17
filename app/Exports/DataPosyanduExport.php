<?php

namespace App\Exports;

use App\Models\DataPosyandu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class DataPosyanduExport implements FromView
{
    private $orientation, $month, $year;

    public function __construct($type, $month, $year)
    {
        $this->orientation = PageSetup::ORIENTATION_LANDSCAPE;
        $this->month = $month;
        $this->year = $year;

        if ($type == "pdf") {
            $this->orientation = PageSetup::ORIENTATION_PORTRAIT;
        }
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $dataPosyandu = DataPosyandu::with('kategoriDetail', 'kecamatanDetail', 'kelurahanDetail', 'kotaDetail', 'puskesmasDetail', 'usiaDetail')->get();

        if ($this->month != null && $this->year != null) {
            $dataPosyandu = DataPosyandu::with('kategoriDetail', 'kecamatanDetail', 'kelurahanDetail', 'kotaDetail', 'puskesmasDetail', 'usiaDetail')
                ->where('bulan', $this->month)
                ->where('tahun', $this->year)
                ->get();
        }

        $data = [
            'datas' => $dataPosyandu,
        ];
        return view('export-templates.data-posyandu', $data);
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeSheet::class => function (BeforeSheet $event) {
                $event->sheet
                    ->getDelegate()
                    ->getPageSetup()
                    ->setOrientation(PageSetup::ORIENTATION_LANDSCAPE);
            }
        ];
    }
}
