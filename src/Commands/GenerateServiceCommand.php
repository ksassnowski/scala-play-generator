<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class GenerateServiceCommand extends GeneratorCommand
{
    /**
     * Root namespace for tests.
     *
     * @var string
     */
    protected $rootNamespace = 'de.synectic.syn6.components.services';

    /**
     * Root path for controller files.
     *
     * @var string
     */
    protected $rootPath = 'app/de/synectic/syn6/components/services';

    /**
     * Name of the command.
     *
     * @var string 
     */
    protected $name = 'make:service';

    /**
     * Description of the command.
     *
     * @var string
     */
    protected $description = 'Erzeugt einen neuen Service';

    /**
     * Type of the command.
     * 
     * @var string
     */
    protected $type = 'Service';

    /**
     * Get the template stub.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->finder->get(__DIR__ . '/../stubs/Service.stub');
    }

}
