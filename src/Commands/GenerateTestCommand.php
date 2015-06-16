<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateTestCommand extends GeneratorCommand
{
    /**
     * Root namespace for tests.
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
     * Type of the command.
     * 
     * @var string
     */
    protected $type = 'Test';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $suite = $input->getArgument('suite');

        $this->rootNamespace = $suite;

        $this->rootPath .= '/' . $suite;

        parent::execute($input, $output);
    }

    /**
     * Get the template stub.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->finder->get(__DIR__ . '/../stubs/Test.stub');
    }

    protected function getArguments()
    {
        parent::getArguments();

        return [
            ['suite', InputArgument::REQUIRED, 'Test Suite für diesen Test.'],
            ['name', InputArgument::REQUIRED, 'Name der generierten Klasses'],
        ];
    }

}
