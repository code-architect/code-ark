<?php

namespace Core;

/**
 * Error and exception handler
 *
 * PHP Version 5.6
 */
 class Error
 {

     /**
      * Error Handler. Convert all errors to Exceptions by throwing and ErrorException
      *
      * @param int $level       Error Level
      * @param string $message  Error Message
      * @param string $file     Filename the error was raised in
      * @param int $line        Line number in the file
      */
     public static function errorHandler($level, $message, $file, $line)
     {
         if(error_reporting() !== 0)    // to keep the @ operator working
         {
             throw new \ErrorException($message, 0, $level, $file, $line);
         }
     }


     /**
      * Exception Handler
      *
      * @param $exception
      *
      * @return void
      */
     public static function exceptionHandler($exception)
     {
         echo "<h1>Fatal Error</h1>";
         echo "<p>Uncaught exception: '".get_class($exception)."'</p>";
         echo "<p>Message: '".$exception->getMessage()."'</p>";
         echo "<p>Stack trace:<pre>".$exception->getTraceAsString()."</pre></p>";
         echo "<p>Thrown in '".$exception->getFile()."' on line ".$exception->getLine()."</p>";
     }



 }

