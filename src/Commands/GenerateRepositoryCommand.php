<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class GenerateRepositoryCommand extends GeneratorCommand
{
    /**
     * Root namespace for tests.
     *
     * @var string
     */
    protected $rootNamespace = 'de.synectic.syn6.components.repositories';

    /**
     * Root path for controller files.
     *
     * @var string
     */
    protected $rootPath = 'app/de/synectic/syn6/components/repositories';

    /**
     * Name of the command.
     *
     * @var string 
     */
    protected $name = 'make:repo';

    /**
     * Description of the command.
     *
     * @var string
     */
    protected $description = 'Erzeugt ein neues Repository';

    /**
     * Type of the command.
     * 
     * @var string
     */
    protected $type = 'Repository';

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
