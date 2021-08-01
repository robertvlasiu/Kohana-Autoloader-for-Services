<?php

class ServicesAutoloader
{
    public static function parseDir($file, $path)
    {
        $abstractPath = str_replace(APPPATH, '', $path);

        if ($pathToFile = Kohana::find_file($abstractPath, $file))
        {
            require $pathToFile;

            return true;
        }

        $dirs = array_filter(glob($path . '/*'), 'is_dir');

        foreach ($dirs as $dir) {
            self::parseDir($file, $dir);
        }

        return false;
    }

    public static function loadServices($class, $directory = 'classes/Services')
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

        self::parseDir($file, APPPATH . $directory);

        // Class is not in the filesystem
        return false;
    }
}