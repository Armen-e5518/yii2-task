<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/15/2018
 * Time: 5:54 PM
 */

namespace frontend\components;


class FileDownload
{
    public $url;

    private $file_name;

    public $save_phat;

    public function __construct($url, $save_phat)
    {
        $this->url = $url;
        $this->save_phat = $save_phat;
        $this->file_name = basename($this->url);
    }

    public function save()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, false);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        $fp = fopen($this->save_phat . $this->file_name, 'w');
        fwrite($fp, $result);
        return fclose($fp);
    }
}