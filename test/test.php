<?php
set_error_handler(array('a', 'b'));
register_shutdown_function(array('a', 'c'));
set_exception_handler(array('a', 'd'));
try {
  a();
} catch (Exception $e) {

    echo "false";
}


class a
{

    function __construct()
    {

    }

    static function b($no, $errStr, $file, $errLine)
    {
        echo $errLine . ':' . $no . ':' . $errStr . "<BR>";
    }

    static function c()
    {
        $error = error_get_last();
        if ($error !== null){
            echo "haaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";

            var_dump($error);
        }
    }
    static function d()
    {
       echo  "faafafa";
    }
}



