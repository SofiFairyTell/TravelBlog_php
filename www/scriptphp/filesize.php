<?php

function getRes($path = '')
{
    $res = getFilesSize($path);
    return $res > 0 ? getFormat($res) : "Ошибка в указании целевой директории";
    // return $res > 0 ? "${res} байт" : "Путь неверный!";
}

function getFilesSize($path = '')
{
    if(!preg_match('/\.\.\//', $path)) {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $fullPath = $root . $path;
        if (file_exists($fullPath)) {
            $fileSize = 0;
            if (is_dir($fullPath)) {
                $dir = scandir($fullPath);
                if (!empty($dir)) {
                    foreach ($dir as $file) {
                        if (($file != '.') && ($file != '..'))
                            if (is_dir($fullPath . '/' . $file))
                                /*Файл в данном случае будет являться директорией*/
                                $fileSize += getFilesSize($path . '/' . $file);
                            else
                                $fileSize += filesize($fullPath . '/' . $file);
                    }
                    return $fileSize;
                }
    
            } else {
                return filesize($fullPath);
            }
        }
    } else {
        return -1;
    }   
}

function getFormat($size)
{
    $format[0] = 'байт'; $format[1] = 'Кбайт';
    $format[2] = 'Мбайт'; $format[3] = 'Гбайт';
    $format[4] = 'Тбайт';
    $format_ = 0;
    while(floor($size/1024)>0)
    {
        ++$format_;
        $size /=1024;
    }
    $ret = round($size,1)."".(isset($format[$format_])?$format[$format_]:'??');
    return $ret;
}