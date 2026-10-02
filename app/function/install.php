<?php
class InstallLockChecker {
    private $file;

    public function __construct($file) {
        $this->file = $file;
    }

    public function InstallationComplete() {
        if (file_exists($this->file)) {
            if (strpos(file_get_contents($this->file), 'thanhdieu') !== false) {
                return true;
            }
        }
        return false;
    }

    public function redirect($redirect) {
        if (strpos($_SERVER['REQUEST_URI'], 'install') === false) {
            if (!$this->InstallationComplete()) {
                die('<meta http-equiv="refresh" content="0; url='.$redirect.'">');
            }
        }
    }
}

(new InstallLockChecker($_SERVER['DOCUMENT_ROOT'].'/install.lock'))->redirect('/install/');