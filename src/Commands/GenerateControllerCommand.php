<?php

namespace synectic\Generators\Commands;

use Symfony\Component\Console\Input\InputArgument;

class GenerateControllerCommand extends GeneratorCommand
{

    protected $name = 'make:controller';

    protected $description = 'Erzeugt einen neuen Controller';

    protected $type = 'Controller';

    protected $rootNamespace = 'de.synectic.syn6.controllers';

    protected $rootPath = 'app/de/synectic/syn6/controllers';

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get the template stub.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->finder->get(__DIR__ . '/../stubs/Controller.stub');
    }

}
