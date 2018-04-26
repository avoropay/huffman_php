<?php

class HuffmanCodeFile extends Huffman
{
    private $huffmanBuff;
    private $buffSize;
    private $fileSrcHandle;
    private $fileSrcName;
    private $fileDstHandle;
    private $fileDstName;

    public function __construct($fileSrc, $fileDst, $buffSize)
    {
        $this->buffSize = $buffSize;
        $this->fileSrcName = $fileSrc;
        $this->fileDstName = $fileDst;
        $this->huffmanBuff = str_repeat(pack('C',0), $buffSize);
        parent::__construct();
    }

    public function encode_file() {
        $status = 1;
        try {
            if (!is_file($this->fileSrcName) === true){
                throw new \Exception("file not exist ");
            }
            $this->fileSrcHandle = fopen($this->fileSrcName, 'r');
            if (!is_resource($this->fileSrcHandle) === true) {
                throw new \Exception("fileSrcHandle is not resourse");
            }
            $this->fileDstHandle = fopen($this->fileDstName, 'w');
            if (!is_resource($this->fileDstHandle) === true) {
                throw new \Exception("fileDstHandle is not resourse");
            }
            while (!feof($this->fileSrcHandle)) {
                $this->huffmanBuff = fread($this->fileSrcHandle, $this->buffSize);
                parent::encode($this->huffmanBuff);
                if (fwrite($this->fileDstHandle, $this->encoded) === FALSE) {
                    throw new \Exception("Error encode");
                    break;
                }
            }
        } catch (\Exception $e) {
            echo "ERROR: $e";
        }
        return $status;
    }
}