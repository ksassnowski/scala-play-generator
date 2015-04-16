<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class GenerateTestCommand extends GeneratorCommand
{
    /**
     * Root namespace for controllers.
     *
     * @var string
     */
    protected $rootNamespace = '';

    /**
     * Root path for controller files.
     *
     * @var string
     */
    protected $rootPath = 'test';

    /**
     * Name of the command.
     *
     * @var string 
     */
    protected $name = 'make:test';

    /**
     * Description of the command.
     *
     * @var string
     */
    protected $description = 'Erzeugt einen neuen Test';

    /**
     * Get the template stub.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->finder->get(__DIR__ . '/../stubs/Test.stub');
    }

}
