<?php

namespace synectic\Generators\Commands;

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
     * Execute the command.
     *
     * @return
     */
    protected function fire()
    {
        $this->output->writeln('<info>It worked!</info>');
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

    }

}
