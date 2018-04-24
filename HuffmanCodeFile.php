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
            if (is_file($this->fileSrcName) === true) {
                $this->fileSrcHandle = fopen($this->fileSrcName, 'r');
                if (is_resource($this->fileSrcHandle) === true) {
                    $this->fileDstHandle = fopen($this->fileDstName, 'w');
                    if (is_resource($this->fileDstHandle) === true) {
                        while (!feof($this->fileSrcHandle)) {
                            $this->huffmanBuff = fread($this->fileSrcHandle, $this->buffSize);
                            parent::encode($this->huffmanBuff);
                            if (fwrite($this->fileDstHandle, $this->encoded) === FALSE) {
                                $status = -1;
                                break;
                            }
                        }
                    } else {
                        $status = -2;
                    }
                } else {
                    $status = -3;
                }
            } else {
                $status = -4;
            }
        } catch (Exception $e) {
            $status = -1;
        }
        return $status;
    }
}