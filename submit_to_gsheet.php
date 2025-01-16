<?php
require 'vendor/autoload.php';

use Google\Client;
use Google\Service\Sheets;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $service = $_POST['service'];
    $departure = $_POST['departure'];

    // Inisialisasi Google Client
    $client = new Client();
    $client->setAuthConfig('credentials.json');
    $client->addScope(Sheets::SPREADSHEETS);

    // ID Google Sheets dan range
    $spreadsheetId = 'SPREADSHEET_ID_ANDA';
    $range = 'Sheet1!A:E';

    $service = new Sheets($client);

    // Data untuk dimasukkan ke Google Sheets
    $values = [
        [$name, $address, $phone, $service, $departure]
    ];

    $body = new \Google\Service\Sheets\ValueRange([
        'values' => $values
    ]);

    $params = [
        'valueInputOption' => 'RAW'
    ];

    // Masukkan data ke Google Sheets
    $service->spreadsheets_values->append($spreadsheetId, $range, $body, $params);

    echo "Data berhasil disimpan ke Google Sheets!";
}
?>
