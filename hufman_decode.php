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

$obj->decode();
var_dump($obj->decoded);