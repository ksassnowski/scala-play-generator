<?php

namespace synectic\Generators\Commands;

use synectic\Generators\Filesystem\Filesystem;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

abstract class GeneratorCommand extends Command
{

    /**
     * The command's name
     *
     * @var string
     */
    protected $name;

    /**
     * The command's description
     *
     * @var string
     */
    protected $description;

    /**
     * The type of class that gets generated.
     *
     * @var string
     */
    protected $type;

    /**
     * The command's input (arguments and options)
     *
     * @var Symfony\Component\Console\Input\InputInterface
     */
    protected $input;

    /**
     * The command's output interface
     *
     * @var Symfony\Component\Console\Output\OutputInterface
     */
    protected $output;

    /**
     * Filesystem
     *
     * @var synectic\Generators\Filesystem\Filesystem
     */
    protected $finder;

    public function __construct()
    {
        parent::__construct($this->name);

        $this->finder = new Filesystem();

        $this->setDescription($this->description);
        $this->specifyParameters();
    }

    /**
     * Get and register the command's arguments and options.
     *
     * @return void
     */
    protected function specifyParameters()
    {
        foreach($this->getArguments() as $argument)
        {
            call_user_func_array([$this, 'addArgument'], $argument);
        }

        foreach($this->getOptions() as $option)
        {
            call_user_func_array([$this, 'addOption'], $option);
        }
    }

	/**
	 * Run the console command.
	 *
	 * @param  \Symfony\Component\Console\Input\InputInterface  $input
	 * @param  \Symfony\Component\Console\Output\OutputInterface  $output
	 * @return int
	 */
	public function run(InputInterface $input, OutputInterface $output)
	{
		$this->input = $input;

		$this->output = $output;

		return parent::run($input, $output);
	}

    /**
     * Execute the command.
     *
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->fire();
    }

    /**
     * Execute the command.
     *
     * @return void
     */
    protected function fire()
    {
        $className = $this->input->getArgument('name');

        $path = $this->getPath($className);

        if ($this->finder->exists($path))
        {
            return $this->error("{$this->type} {$className} already exists.");
        }

        $fileContent = $this->getStub();

        $this->replaceClassName($fileContent, $className);

        $this->replaceNamespace($fileContent, $className);

        $this->finder->put($this->getPath($className), $fileContent);

        $this->info("{$this->type} {$className} created.");
    }

    /**
     * Return the command's arguments
     *
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['name', InputArgument::REQUIRED, 'Name der generierten Klasse']
        ];
    }

    /**
     * Return the command's options
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

    /**
     * Get the template stub
     *
     * @return
     */
    abstract protected function getStub();

    /**
     * Replace the classname in the template
     *
     * @param string $fileContent
     * @param string $className
     * @return string
     */
    protected function replaceClassName(&$fileContent, $name)
    {
        $className = end(explode('/', $name));

        $fileContent = str_replace("{{name}}", $className, $fileContent); 
    }

    /**
     * Replace the namespace in a template.
     *
     * @param string $fileContent
     * @param string $className
     * @return string
     */
    protected function replaceNamespace(&$fileContent, $name)
    {
        $namespace = $this->getNamespace($name);

        $fileContent = str_replace("{{namespace}}", $namespace, $fileContent);
    }

    protected function getNamespace($name)
    {
        $nameParts = explode('/', $name);

        if (count($nameParts) === 1)
        {
            return $this->rootNamespace;
        }

        return $this->rootNamespace . '.' .implode(array_slice($nameParts, 0, -1), '.');
    }

    /**
     * Extract the filepath from the classname.
     *
     * @param string $className
     * @return string
     */
    protected function getPath($name)
    {
        $nameParts = explode('/', $name);

        $filename = end($nameParts) . '.scala';

        if (count($nameParts) === 1)
        {
            return $this->rootPath . '/' . $filename;
        }

        $path = implode(array_slice($nameParts, 0, -1), '/');

        return $this->rootPath . '/' . $path . '/' . $filename;
    }

    /**
     * Write an error to the output.
     *
     * @param string $message
     */
    protected function error($message)
    {
        $this->output->writeln("<error>{$message}</error>");
    }

    /**
     * Write an info message to the output.
     *
     * @param string $message
     */
    protected function info($message)
    {
        $this->output->writeln("<info>{$message}</info>");
    }

}
