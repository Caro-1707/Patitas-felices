<?php

namespace App\Exports;

use App\Models\Mascota;
use App\Models\Categoria;
use App\Models\User;
use App\Models\SolicitudAdopcion;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class EstadisticasExport implements
    FromArray,
    WithHeadings,
    ShouldAutoSize,
    WithStyles,
    WithEvents,
    WithTitle
{
    /**
     * Paleta de colores Patitas Felices (sin '#', formato ARGB que pide PhpSpreadsheet)
     */
    private const COLOR_ROSA_OSCURO  = 'C0546A';
    private const COLOR_ROSA_CLARO   = 'FADADD';
    private const COLOR_BEIGE        = 'F5EFE6';
    private const COLOR_CREMA        = 'FDF8F3';
    private const COLOR_TEXTO        = '3D2B1F';
    private const COLOR_BLANCO       = 'FFFFFF';
    private const COLOR_VERDE        = 'E8F7EE';
    private const COLOR_VERDE_TEXTO  = '2E8050';
    private const COLOR_NARANJA      = 'FFF3E0';
    private const COLOR_NARANJA_TXT  = 'C96B2E';

    public function title(): string
    {
        return '🐾 Estadísticas';
    }

    public function headings(): array
    {
        return [
            'Indicador',
            'Cantidad',
        ];
    }

    public function array(): array
    {
        return [

            ['Total de Mascotas', Mascota::count()],

            ['Mascotas Disponibles',
                Mascota::where('estado', 'Disponible')->count()
            ],

            ['Mascotas Adoptadas',
                Mascota::where('estado', 'Adoptada')->count()
            ],

            ['Total Categorías',
                Categoria::count()
            ],

            ['Total Usuarios',
                User::where('rol', 'usuario')->count()
            ],

            ['Solicitudes Pendientes',
                SolicitudAdopcion::where('estado', 'Pendiente')->count()
            ],

            ['Solicitudes Aprobadas',
                SolicitudAdopcion::where('estado', 'Aprobada')->count()
            ],

            ['Solicitudes Rechazadas',
                SolicitudAdopcion::where('estado', 'Rechazada')->count()
            ],

        ];
    }

    /**
     * Estilos base (encabezado de la tabla).
     */
    public function styles(Worksheet $sheet)
    {
        return [

            1 => [
                'font' => [
                    'bold'  => true,
                    'size'  => 13,
                    'color' => ['rgb' => self::COLOR_BLANCO],
                    'name'  => 'Calibri',
                ],
                'fill' => [
                    'fillType'   => 'solid',
                    'startColor' => ['rgb' => self::COLOR_ROSA_OSCURO],
                ],
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                    'vertical'   => Alignment::VERTICAL_CENTER,
                ],
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color'       => ['rgb' => self::COLOR_ROSA_OSCURO],
                    ],
                ],
            ],

        ];
    }

    /**
     * Estilos avanzados: fila de título, zebra striping, bordes,
     * altura de fila y colores condicionales por tipo de indicador.
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet      = $event->sheet->getDelegate();
                $totalFilas = count($this->array()) + 1; // +1 por la cabecera

                // --- Insertar fila de título arriba de todo ---
                $sheet->insertNewRowBefore(1, 2);
                $sheet->mergeCells('A1:B1');
                $sheet->setCellValue('A1', '🐾 Patitas Felices — Reporte de Estadísticas');
                $sheet->getStyle('A1')->getFont()
                    ->setBold(true)
                    ->setSize(15)
                    ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(self::COLOR_ROSA_OSCURO));
                $sheet->getStyle('A1')->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER)
                    ->setVertical(Alignment::VERTICAL_CENTER);
                $sheet->getRowDimension(1)->setRowHeight(28);
                $sheet->getRowDimension(2)->setRowHeight(6); // fila espaciadora

                $sheet->getStyle('A1:B2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setRGB(self::COLOR_ROSA_CLARO);

                // El encabezado real (Indicador / Cantidad) ahora está en la fila 3
                $headerRow = 3;
                $firstData = $headerRow + 1;
                $lastData  = $headerRow + count($this->array());

                $sheet->getRowDimension($headerRow)->setRowHeight(24);

                // --- Bordes y centrado general de toda la tabla ---
                $rango = "A{$headerRow}:B{$lastData}";
                $sheet->getStyle($rango)->getBorders()->getAllBorders()
                    ->setBorderStyle(Border::BORDER_THIN)
                    ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color('EAE0D0'));

                $sheet->getStyle("B{$firstData}:B{$lastData}")->getAlignment()
                    ->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $sheet->getStyle("A{$firstData}:A{$lastData}")->getFont()->setBold(true);
                $sheet->getStyle("A{$firstData}:A{$lastData}")->getFont()
                    ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color(self::COLOR_TEXTO));

                // --- Zebra striping (filas alternas en beige claro) ---
                for ($fila = $firstData; $fila <= $lastData; $fila++) {
                    if (($fila - $firstData) % 2 === 1) {
                        $sheet->getStyle("A{$fila}:B{$fila}")->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setRGB(self::COLOR_CREMA);
                    }
                }

                // --- Color condicional para filas clave (positivo / pendiente / negativo) ---
                $coloresPorEtiqueta = [
                    'Mascotas Disponibles'    => [self::COLOR_VERDE, self::COLOR_VERDE_TEXTO],
                    'Solicitudes Aprobadas'   => [self::COLOR_VERDE, self::COLOR_VERDE_TEXTO],
                    'Solicitudes Pendientes'  => [self::COLOR_NARANJA, self::COLOR_NARANJA_TXT],
                    'Solicitudes Rechazadas'  => [self::COLOR_ROSA_CLARO, self::COLOR_ROSA_OSCURO],
                ];

                foreach ($this->array() as $i => $fila) {
                    $etiqueta = $fila[0];
                    if (isset($coloresPorEtiqueta[$etiqueta])) {
                        [$fondo, $texto] = $coloresPorEtiqueta[$etiqueta];
                        $numFila = $firstData + $i;

                        $sheet->getStyle("B{$numFila}")->getFill()
                            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                            ->getStartColor()->setRGB($fondo);

                        $sheet->getStyle("B{$numFila}")->getFont()
                            ->setBold(true)
                            ->setColor(new \PhpOffice\PhpSpreadsheet\Style\Color($texto));
                    }
                }

                // --- Ancho de columnas más cómodo ---
                $sheet->getColumnDimension('A')->setWidth(28);
                $sheet->getColumnDimension('B')->setWidth(16);

                // --- Congelar encabezado al hacer scroll ---
                $sheet->freezePane('A' . $firstData);
            },
        ];
    }
}