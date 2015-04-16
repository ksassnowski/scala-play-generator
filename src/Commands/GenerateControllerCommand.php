<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class GenerateControllerCommand extends GeneratorCommand
{
    /**
     * Root namespace for controllers.
     *
     * @var string
     */
    protected $rootNamespace = 'de.synectic.syn6.controllers';

    /**
     * Root path for controller files.
     *
     * @var string
     */
    protected $rootPath = 'app/de/synectic/syn6/controllers';

    /**
     * Name of the command.
     *
     * @var string 
     */
    protected $name = 'make:controller';

    /**
     * Description of the command.
     *
     * @var string
     */
    protected $description = 'Erzeugt einen neuen Controller';

    /**
     * Constructor
     */
    public function __construct(Filesystem $finder)
    {
        parent::__construct();

        $this->finder = $finder;
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
