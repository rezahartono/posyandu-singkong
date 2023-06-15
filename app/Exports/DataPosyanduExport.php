<?php

namespace App\Exports;

use App\Models\DataPosyandu;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;

class DataPosyanduExport implements FromView
{
    private $orientation;

    public function __construct($type)
    {
        $this->orientation = PageSetup::ORIENTATION_LANDSCAPE;

        if ($type == "pdf") {
            $this->orientation = PageSetup::ORIENTATION_PORTRAIT;
        }
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $data = [
            'datas' => DataPosyandu::with('kategoriDetail', 'kecamatanDetail', 'kelurahanDetail', 'kotaDetail', 'puskesmasDetail', 'usiaDetail')->get(),
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
