<?php

class ServicesAutoloader
{
    public static function parseDir($file, $path, &$filePath)
    {
        $abstractPath = str_replace(APPPATH, '', $path);

        if ($pathToFile = Kohana::find_file($abstractPath, $file))
        {
            if (!$filePath) {
                $filePath = $pathToFile;
            } else {
                $filePath = false;
                return false;
            }

        }

        $dirs = array_filter(glob($path . '/*'), 'is_dir');

        foreach ($dirs as $dir) {
            self::parseDir($file, $dir, $filePath);
        }

        return false;
    }

    public static function autoLoadClass($class, $directory)
    {
        // Transform the class name according to PSR-0
        $class     = ltrim($class, '\\');
        $file      = '';
        $namespace = '';

        if ($last_namespace_position = strripos($class, '\\'))
        {
            $namespace = substr($class, 0, $last_namespace_position);
            $class     = substr($class, $last_namespace_position + 1);
            $file      = str_replace('\\', DIRECTORY_SEPARATOR, $namespace).DIRECTORY_SEPARATOR;
        }

        $file .= str_replace('_', DIRECTORY_SEPARATOR, $class);

        $filePath = false;
        self::parseDir($file, APPPATH . $directory, $filePath);

        if ($filePath) {
            require $filePath;
            return true;
        }

        throw HTTP_Exception::factory(500, $class . ' is already implemented!');
    }
}