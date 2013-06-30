<?php

/**
 * This file is part of the php2rpm package.
 *
 * (c) Shawn Iwinski <shawn.iwinski@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SAI\Php2Rpm\Type;

use Symfony\Component\Console\Command\Command;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
abstract class AbstractType
{

    /**
     * @var string
     */
    protected $project;

    /**
     * @var bool
     */
    protected $valid;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $version;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $downloadUrl;

    /**
     * @var Command
     */
    protected $command;

    /**
     *
     */
    public function __construct($project = '', Command $command = null)
    {
        if (!empty($project)) {
            $this->setProject($project);
        }

        if (null !== $command) {
            $this->setCommand($command);
        }
    }

    /**
     *
     */
    public function getCommand()
    {
        return $this->command;
    }

    /**
     *
     */
    public function setCommand(Command $command)
    {
        if (null === $command) {
            throw new \RuntimeException('Command cannot be null');
        }

        $this->command = $command;

        return $this;
    }

    /**
     *
     */
    public function getApplication()
    {
        if (!isset($this->command)) {
            throw new \RuntimeException('Command not set');
        }

        return $this->command->getApplication();
    }

    /**
     *
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     *
     */
    public function setProject($project)
    {
        $project = trim($project);
        if (empty($project)) {
            throw new \RuntimeException('Project cannot be empty');
        }

        $this->project = $project;
        $this->configure();

        return $this;
    }

    /**
     *
     */
    public function isValid()
    {
        return (bool) $this->valid;
    }

    /**
     *
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     *
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     *
     */
    public function getDownloadUrl()
    {
        return $this->downloadUrl;
    }

    /**
     *
     */
    abstract public function configure();

}
