<?php
/**
 * Random Image Random
 *
 * This script generates a random URL for an image.
 *
 * @package WusTeamV3-Remake
 * @author Vương Thanh Diệu <www.facebok.com/wusthanhdieu>
 * @file random-img.php
 */
header('Content-Type: application/json');
class oOo {
    private $w;
    private $l;

    public function __construct() {
        $this->w=[
            "https://i.imgur.com/PKhCLx7.png",
            "https://i.imgur.com/5YfEsk8.png",
            "https://i.imgur.com/5YfEsk8.png",
            "https://i.imgur.com/2EuQ43W.png",
            "https://i.imgur.com/QdcSqQk.png",
            "https://i.imgur.com/cOnHtyn.png",
            "https://i.imgur.com/jguj081.png",
            "https://i.imgur.com/IS8bp5w.png",
        ];
        $this->l=null;
    }

    public function OoO() {
        $s=$this->w[array_rand($this->w)];
        while ($s === $this->l) {
            $s=$this->w[array_rand($this->w)];
        }
        $this->l=$s;
        return $s;
    }
}

$oOo=new oOo();
echo json_encode(['status' => '200', 'img' => $oOo->OoO()], JSON_UNESCAPED_SLASHES, JSON_UNESCAPED_UNICODE);