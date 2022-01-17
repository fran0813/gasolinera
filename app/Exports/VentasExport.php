<?php

namespace App\Exports;

use App\Models\Informacion;
use App\Models\Venta;
use Illuminate\Contracts\View\View;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class VentasExport implements FromView, WithStyles, WithEvents, ShouldAutoSize
{
    protected $venta_id;

    public function __construct(Int $venta_id)
    {
        $this->venta_id = $venta_id;
    }

    public function styles(Worksheet $sheet)
    {
        $styleArray = [
		    'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
		];

        $styleArray2 = [
		    'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
		];

        $sheet->getStyle('A1:B50')->getAlignment()->setWrapText(true);
        $sheet->getStyle('A1:B5')->applyFromArray($styleArray);
        $sheet->getStyle('A7:B50')->applyFromArray($styleArray2);
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(30);

                $count = Venta::find($this->venta_id)->productos->count();
                for ($i=8; $i < ($count+8); $i++) {
                    $event->sheet->getDelegate()->getRowDimension($i)->setRowHeight(30);
                }

                $event->sheet->getDelegate()->getRowDimension(8+$count)->setRowHeight(40);

                // $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(8);
                // $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(11);

                $event->sheet->getPageSetup()
                    ->setPaperSize(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::PAPERSIZE_LETTER);
                $event->sheet->getPageMargins()->setTop(0.2);
                $event->sheet->getPageMargins()->setLeft(0.2);
            },
        ];
    }

    public function view(): View
    {
        $venta = Venta::find($this->venta_id);
        $informacion = Informacion::first();

        return view('exports.venta', [
            'venta' => $venta,
            'informacion' => $informacion,
        ]);
    }
}
