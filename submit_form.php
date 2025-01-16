<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $departure = $_POST['departure'];

    // Buat file spreadsheet baru atau buka yang sudah ada
    $file = 'data_jamaah.xlsx';
    if (file_exists($file)) {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
    } else {
        $spreadsheet = new Spreadsheet();
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama')
            ->setCellValue('B1', 'Alamat')
            ->setCellValue('C1', 'Nomor Telepon')
            ->setCellValue('D1', 'Jenis Layanan')
            ->setCellValue('E1', 'Tanggal Keberangkatan');
    }

    // Cari baris kosong berikutnya
    $sheet = $spreadsheet->getActiveSheet();
    $row = $sheet->getHighestRow() + 1;

    // Isi data ke baris baru
    $sheet->setCellValue("A$row", $name)
          ->setCellValue("B$row", $address)
          ->setCellValue("C$row", $phone)
          ->setCellValue("D$row", $service)
          ->setCellValue("E$row", $departure);

    // Simpan ke file Excel
    $writer = new Xlsx($spreadsheet);
    $writer->save($file);

    echo "Data berhasil disimpan ke Excel!";
}
?>
