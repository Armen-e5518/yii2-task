<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 6/21/2018
 * Time: 12:40 PM
 */

namespace frontend\components;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class File extends UploadedFile
{
    const IMAGE_MAX_SIZ = 20000000;
    const VIDEO_MAX_SIZ = 50000000;

    const MIN_WIDTH = 100;
    const MIN_HEIGHT = 100;

    const IMAGE_VALID_EXTENSION = [
        "jpg",
        "png",
        "jpeg",
        "gif",
    ];
    const VIDEO_VALID_EXTENSION = [
        "mp4",
        "avi",
        "mov",
        "flv",
        "wmv",
    ];

    public static function UploadFile($file, $name, $g_name, $f_name, $flag = true)
    {
        $config = [
            'MAX_SIZ' => $flag ? self::IMAGE_MAX_SIZ : self::VIDEO_MAX_SIZ,
            'VALID_EXTENSION' => $flag ? self::IMAGE_VALID_EXTENSION : self::VIDEO_VALID_EXTENSION,
            'PHAT' => $flag ? \Yii::$app->params['images_phat'] : \Yii::$app->params['videos_phat'],
        ];
        if (!empty($file[$g_name]["name"][$name][$f_name])) {
            if ($flag) {
                // Get Image Dimension
                $fileinfo = @getimagesize($file[$g_name]["tmp_name"][$name][$f_name]);
                $width = $fileinfo[0];
                $height = $fileinfo[1];
            }
            $target_file = $config['PHAT'] . basename($file[$g_name]["name"][$name][$f_name]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($file[$g_name]["size"][$name][$f_name] > $config['MAX_SIZ']) {
                return [
                    'status' => false,
                    'error' => 'Sorry, your file is too large.'
                ];
            }
            if (!in_array($imageFileType, $config['VALID_EXTENSION'])) {
                return [
                    'status' => false,
                    'error' => 'Sorry, you do not have the wrong file format.'
                ];
            } else {
                $file_name = md5(microtime(true)) . '.' . $imageFileType;
            }
            if ($flag && ($width < self::MIN_WIDTH || $height < self::MIN_HEIGHT)) {
                return [
                    'status' => false,
                    'error' => 'The image must be at least 400 pixels (width and height). Now '.$width.'X'.$height
                ];
            }
            if (move_uploaded_file($file[$g_name]["tmp_name"][$name][$f_name], $config['PHAT'] . $file_name)) {
                return [
                    'status' => true,
                    'error' => '',
                    'file_name' => $file_name
                ];
            } else {
                return [
                    'status' => false,
                    'error' => "Sorry, there was an error uploading your file.",
                    'file_name' => $file_name
                ];
            }
        }
        return [
            'status' => false,
            'error' => '',
        ];
    }


}