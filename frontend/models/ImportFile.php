<?php

namespace frontend\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Password reset form
 */
class ImportFile extends Model
{
    /**
     * @var UploadedFile
     */
    public $excel;

    public function rules()
    {
        return [
            [['excel'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, xlsm, xlsb, xls'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->excel->saveAs('files/' . $this->excel->baseName . '.' . $this->excel->extension);
            return 'files/' . $this->excel->baseName . '.' . $this->excel->extension;
        } else {
            return false;
        }
    }
}
