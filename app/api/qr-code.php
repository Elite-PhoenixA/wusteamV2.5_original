<?php
header('Content-Type: image/png');
/**
 * Generator Image QR-Code
 *
 * This script generates a QR code for a given data.
 *
 * @package WusTeamV3-Remake
 * @author Vương Thanh Diệu <www.facebok.com/wusthanhdieu>
 * @file qr-code.php
 */
class oOo {
    public function QRCode($size, $data) {
        $api = 'https://api.qrserver.com/v1/create-qr-code/?size=' . urlencode($size) . '&data=' . urlencode($data);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $api,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $response = curl_exec($curl);
        if ($response === false) {
            curl_close($curl);
            return;
        }
        curl_close($curl);
        return $response;
    }
}

$oOo = new oOo();

if (isset($_GET['data']) && !empty($_GET['data']) && isset($_GET['size']) && !empty($_GET['size'])) {
    $size = $_GET['size'];
    $data = $_GET['data'];
    echo $oOo->QRCode($size, $data);
}