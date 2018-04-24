<?php

class ClassAutoloader {
    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }
    private function loader($className) {
        include $className . '.php';
    }
}

$autoloader = new ClassAutoloader();

$buf = 'hhumster';
$obj = new HuffmanCodeFile('in_file.bin', 'out_file.bin',1024);
    if ($obj->encode_file() === 1) {
        // Good
    };