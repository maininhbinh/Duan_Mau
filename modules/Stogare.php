<?php

namespace Modules;

class Stogare
{

    static public $path_upload = "public/upload/";

    static public function exits($path_save)
    {
        if (file_exists(self::$path_upload . $path_save)) {
            return true;
        }
        return false;
    }

    static public function put($path, $imager)
    {
        $fomat = [
            'png',
            'jpg',
            'jpeg',
            'dpf'
        ];

        $file_name = $imager['name'];

        if (empty($file_name)) {
            return false;
        }

        $file_size = $imager['size'];
        $file_tmp = $imager['tmp_name'];
        $imager_name = time() . '-' . $file_name;
        $public_path = self::$path_upload . $path;

        $file_extension = explode('.', $file_name);
        $file_extension = strtolower(end($file_extension));

        if (in_array($file_extension, $fomat)) {
            if ($file_size <= 10000000) {
                if (!is_dir($public_path)) {
                    if (!mkdir($public_path, 0777, true)) {
                        return false;
                    }
                }
                $path_save = $public_path . "/$imager_name";

                if (!move_uploaded_file($file_tmp, $path_save)) {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }

        return $path . '/' . $imager_name;
    }

    static public function delete($path_save)
    {
        if (unlink(self::$path_upload . $path_save)) {
            return true;
        }

        return false;
    }
}
