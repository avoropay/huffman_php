<?php

class ClassAutoloader {
    public function __construct() {
        spl_autoload_register(array($this, 'loader'));
    }
    private function loader($className) {
        include __DIR__ . '/' . $className . '.php';
    }
}

$autoloader = new ClassAutoloader();

$obj = new HuffmanCodeFile('in_file.bin', 'out_file.bin',1024);
    if ($obj->encode_file() === 1) {
        // Good
    };
var_dump($obj);
echo $obj;

echo "\n";
/*
foreach($obj as $key => $value) {
    print "$key => $value\n";
}
echo "\n";
*/

$obj->iterateVisible();