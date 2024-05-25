<?php
require_once('../function.php');
require_once('../vendor/autoload.php'); // Load Composer's autoloader

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

// Create new PhpSpreadsheet object
$objPHPExcel = new Spreadsheet();

// Set document properties
$objPHPExcel->getProperties()->setCreator('Your Name')
    ->setLastModifiedBy('Your Name')
    ->setTitle('Tes')
    ->setSubject('Tes')
    ->setDescription('Tes');

// Set judul
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Laporan Kegiatan IKO')
    ->mergeCells('A1:H1'); // Menggabungkan sel dari A1 sampai H1

// Atur gaya judul
$objPHPExcel->getActiveSheet()->getStyle('A1:H1')->applyFromArray([
    'font' => ['bold' => true], // Atur tebal (bold) teks
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Atur perataan teks di tengah
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Atur perataan vertikal di tengah
    ],
]);

// Add data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A2', 'No.')
    ->setCellValue('B2', 'Tanggal Kegiatan')
    ->setCellValue('C2', 'Lokasi')
    ->setCellValue('D2', 'Tim')
    ->setCellValue('E2', 'Keterangan')
    ->setCellValue('F2', 'Status')
    ->setCellValue('G2', 'Catatan')
    ->setCellValue('H2', 'Foto');

// Atur gaya header kolom
$objPHPExcel->getActiveSheet()->getStyle('A2:H2')->applyFromArray([
    'font' => ['bold' => true], // Atur tebal (bold) teks
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Atur perataan teks di tengah
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER, // Atur perataan vertikal di tengah
    ],
]);

// Atur perataan vertikal di tengah untuk semua sel data
$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();
$highestColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
$cellRange = 'A2:' . $highestColumn . $highestRow;
$objPHPExcel->getActiveSheet()->getStyle($cellRange)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle($cellRange)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

// Add data
$tgl1 = $_GET['tgl1'];
$tgl2 = $_GET['tgl2'];

// Query data from database based on $tgl1 and $tgl2
if (isset($_GET['tgl1']) && isset($_GET['tgl2'])) {
    $tgl1 = $_GET['tgl1'];
    $tgl2 = $_GET['tgl2'];
    // Query data from database based on $tgl1 and $tgl2
    $data = query("SELECT * FROM pelaporaniko WHERE tgl_kegiatan BETWEEN '$tgl1' AND '$tgl2'");
}

$row = 3; // Starting row for data
foreach ($data as $d) {
    $objPHPExcel->getActiveSheet()
        ->setCellValue('A' . $row, $d['id'])
        ->setCellValue('B' . $row, $d['tgl_kegiatan'])
        ->setCellValue('C' . $row, $d['lokasi'])
        ->setCellValue('D' . $row, $d['t_lapor'])
        ->setCellValue('E' . $row, $d['ket'])
        ->setCellValue('F' . $row, $d['status'])
        ->setCellValue('G' . $row, $d['ket_petugas'])
        ->setCellValue('H' . $row, $d['foto']);
    // Set image in cell
    if (!empty($d['foto'])) {
        $file_extension = pathinfo($d['foto'], PATHINFO_EXTENSION);
        $objDrawing = new \PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing();
        $objDrawing->setName('Foto');
        $objDrawing->setDescription('Foto');

        // Check the file extension and use the appropriate function
        if (strtolower($file_extension) === 'png') {
            $objDrawing->setImageResource(imagecreatefrompng('../' . $d['foto']));
            $objDrawing->setRenderingFunction(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_PNG);
            $objDrawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_PNG);
        } elseif (in_array(strtolower($file_extension), ['jpg', 'jpeg'])) {
            $objDrawing->setImageResource(imagecreatefromjpeg('../' . $d['foto']));
            $objDrawing->setRenderingFunction(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::RENDERING_JPEG);
            $objDrawing->setMimeType(\PhpOffice\PhpSpreadsheet\Worksheet\MemoryDrawing::MIMETYPE_DEFAULT);
        } else {
            // Handle unsupported file types here
        }

        // Set image coordinates in cell
        $objDrawing->setCoordinates('H' . $row);

        // Set image width and height
        $objDrawing->setWidth(100); // Set the width in pixels
        $objDrawing->setHeight(100); // Set the height in pixels

        // Offset the image within the cell
        $objDrawing->setOffsetX(1);
        $objDrawing->setOffsetY(1);

        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());
    }

    $row++;
}

// Atur gaya untuk semua sel data
$highestRow = $objPHPExcel->getActiveSheet()->getHighestRow();
$highestColumn = $objPHPExcel->getActiveSheet()->getHighestColumn();
$cellRange = 'A3:' . $highestColumn . $highestRow;
$objPHPExcel->getActiveSheet()->getStyle($cellRange)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle($cellRange)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

// Set auto size for columns A to N
for ($col = 'A'; $col <= 'H'; $col++) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}

// Set height for all rows
for ($i = 1; $i <= $objPHPExcel->getActiveSheet()->getHighestRow(); $i++) {
    $objPHPExcel->getActiveSheet()->getRowDimension($i)->setRowHeight(100);
}

// Set sheet title
$objPHPExcel->getActiveSheet()->setTitle('Pelaporan Kegiatan IKO');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="report_harianIKO.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = new Xlsx($objPHPExcel);
$objWriter->save('php://output');
exit;

// Query data from database based on $month1 and $month2
if (isset($_GET['month1']) && isset($_GET['month'])) {
    $month1 = $_GET['month1'];
    $month2 = $_GET['month2'];
    // Query data from database based on $tgl1 and $tgl2
    $data = query("SELECT * FROM pelaporaniko WHERE tgl_kegiatan BETWEEN '$month1' AND '$month2'");
} 
include "templates/footer.php";
