<?php

namespace synectic\Generators\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

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

    public function __construct()
    {
        parent::__construct($this->name);

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
        return $this->fire();
    }

    /**
     * Return the command's arguments
     *
     * @return array
     */
    protected function getArguments()
    {
        return [];
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
     * Execute the command.
     *
     * @return
     */
    abstract protected function fire();
}
