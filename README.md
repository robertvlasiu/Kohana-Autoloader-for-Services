Creating an autoloader to be able to use Services in KOHANA

KOHANA takes class naming to find the file in folders.
e.g. If I have Robert class in classes/Services/Helpers/Robert.php
the class must be named Services_Helpers_Robert

This autoloader aims to fix that, without impacting the core framework at all!
This should work as long as the Services class doesn't already exist in the project.

If it does and we have services which start with Services_*****, they will probably be included twice. While
this doesn't return an error, it's recommended we don't do this. As a fix, all the Services within the Services
subfolder should be renamed and should NOT contain the 'Services' prefix.

If you have two files with the same name the autoloader will return an error. It will not return an error
if you have two classes with the same name, however, PHPStorm will notify you, but this shouldn't happen since
your class name MUST be the same name as your file name.