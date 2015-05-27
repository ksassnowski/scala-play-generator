<?php

namespace synectic\Generators\Commands;

use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Symfony\Component\Console\Output\OutputInterface;

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
     * Type of the created class.
     *
     * @var string
     */
    protected $type = 'Controller';

    /**
     * Root namespace for tests.
     *
     * @var string
     */
    protected $rootNamespace = 'de.synectic.syn6.controllers';

    /**
     * Root path for test files.
     *
     * @var string
     */
    protected $rootPath = 'app/de/synectic/syn6/controllers';


    /**
     * Run the command.
     *
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        parent::execute($input, $output);

        if ($input->getOption('test'))
        {
            $arguments = [
                'command' => 'make:test',
                'name' => $input->getArgument('name') . 'Spec',
            ];

            $command = $this->getApplication()->find('make:test');

            $command->run(new ArrayInput($arguments), $output);
        }
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

    protected function getOptions()
    {
        return [
            ['test', null, InputOption::VALUE_NONE, 'Gibt an ob ein Test generiert werden soll.'],
        ];
    }

}
