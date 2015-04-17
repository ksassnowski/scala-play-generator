<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class GenerateActionCommand extends GeneratorCommand
{
    /**
     * Root namespace for controllers.
     *
     * @var string
     */
    protected $rootNamespace = 'de.synectic.syn6.actions';

    /**
     * Root path for controller files.
     *
     * @var string
     */
    protected $rootPath = 'app/de/synectic/syn6/actions';

    /**
     * Name of the command.
     *
     * @var string 
     */
    protected $name = 'make:action';

    /**
     * Description of the command.
     *
     * @var string
     */
    protected $description = 'Erzeugt eine neue Action.';

    /**
     * Get the template stub.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->finder->get(__DIR__ . '/../stubs/Action.stub');
    }

}
