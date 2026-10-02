<?php
/**
 * @author Vương Thanh Diệu
 */
try {
    (new LevelPoints())->LevelChecker($taikhoan??null, $user??null);
} catch (Exception $e) {
    // Error
}