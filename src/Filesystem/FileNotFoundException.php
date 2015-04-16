<?php

namespace synectic\Generators\Filesystem;

class FileNotFoundException extends \Exception
{
    public function __construct($message)
    {
        parent::__construct($message);
    }
}
