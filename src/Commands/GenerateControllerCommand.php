<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;

class GenerateControllerCommand extends GeneratorCommand
{
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
     * Symfony Finder
     *
     * @var Symfony\Component\Finder\Finder
     */
    protected $finder;

    /**
     * Constructor
     */
    public function __construct(Filesystem $finder)
    {
        parent::__construct();

        $this->finder = $finder;
    }

    /**
     * Execute the command.
     *
     * @return
     */
    protected function fire()
    {
        $file = $this->getStub();

        $this->output->writeln($file);
    }

    /**
     * Get the command's arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name des Controllers']
        ];
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
