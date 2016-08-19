function log_error($num, $str, $file, $line, $context = null)
{
    log_exception(new ErrorException($str, 0, $num, $file, $line));
}

function log_exception(Exception $e) 
{
    $message = "Type: " . get_class($e) . "; Message: {$e->getMessage()}; File: {$e->getFile()}; Line: {$e->getLine()};";
    QuoteBridge_App::make('log')->addInfo($message, 'system');
}

function check_for_fatal()
{
    $error = error_get_last();
    if ($error['type'] === E_ERROR || $error['type'] === E_USER_ERROR)
    log_error($error["type"], $error["message"], $error["file"], $error["line"]);
}

register_shutdown_function("check_for_fatal");
set_error_handler("log_error");
set_exception_handler("log_exception");
