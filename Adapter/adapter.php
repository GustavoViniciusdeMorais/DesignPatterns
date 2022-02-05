<?php

interface DataSource
{
    public function writeData($data);
    public function readData(): string;
}

class FileDataSource implements DataSource
{
    private $fileName;
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }
    public function writeData($data)
    {
        $myFile = fopen($this->fileName, "w+");
        fwrite($myFile, $data);
        fclose($myFile);
        return "success";
    }
    public function readData(): string
    {
        $myFile = fopen($this->fileName, "r");
        $content = fread($myFile, filesize($this->fileName));
        fclose($myFile);
        return $content;
    }
}

class DataSourceDacorator implements DataSource
{
    public $wrapped;
    public function __construct(DataSource $source)
    {
        $this->wrapped = $source;
    }
    public function writeData($data)
    {
    //test
    }
    public function readData(): string
    {
        return "data";
    }
}

class EncryptionDecorator extends DataSourceDacorator
{
    private $cipher;
    private $iv;
    private $key;
    private $tag;

    public function __construct(DataSource $source)
    {
        parent::__construct($source);
        $this->cipher = "aes-128-gcm";
        $ivlen = openssl_cipher_iv_length($this->cipher);
        $this->iv = openssl_random_pseudo_bytes($ivlen);
        $this->key = openssl_random_pseudo_bytes(1);
        $this->glue = ".";
        $this->tag = "CCM";
    }

    public function writeData($data)
    {
        $data = $this->encryptData($data);
        $this->wrapped->writeData($data);
        return "Conteúdo criptografado: ".$data;
    }

    public function readData(): string
    {
        $encryptedText = $this->wrapped->readData();
        $originalText = openssl_decrypt($encryptedText, $this->cipher, $this->key, 0,  $this->iv, $this->tag);
        return "Texto original: ".$originalText;
    }

    public function encryptData($data)
    {
        return openssl_encrypt($data, $this->cipher, $this->key, 0, $this->iv, $this->tag);
    }
}