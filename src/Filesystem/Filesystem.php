<?php

namespace synectic\Generators\Filesystem;

use synectic\Generators\Filesystem\FileNotFoundException;
use Symfony\Component\Filesystem\Filesystem as Files;

class Filesystem
{

    /**
     * Symfony Filesystem instance.
     *
     * @var Symfony\Components\Filesystem\Filesystem
     */
    protected $fs;

    /**
     * Construct a new Filesystem instance.
     */
    public function __construct()
    {
        $this->fs = new Files();
    }
    
    /**
     * Get a file's contents.
     *
     * @param string $path
     * @return string
     */
    public function get($path)
    {
        if ($this->fs->exists($path)) return file_get_contents($path);

        throw new FileNotFoundException("File does not exist at path {$path}");
    }

    /**
     * Dump contents to a file
     *
     * @param string $path
     * @param string $content
     */
    public function put($path, $content)
    {
        $this->fs->dumpFile($path, $content);
    }
}
