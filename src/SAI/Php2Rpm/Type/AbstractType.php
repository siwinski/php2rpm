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
use Guzzle\Http\Client;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
abstract class AbstractType
{
    /**
     *
     */
    protected $command;

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
        $this->command = $command;
        return $this;
    }

    /**
     *
     */
    public function getApplication()
    {
        if (!isset($this->command)) {
            throw new \RuntimeException('Type\'s command not set');
        }

        return $this->command->getApplication();
    }

    /**
     *
     * @param string $project
     */
    public function normalizeProject($project)
    {
        return $project;
    }

    /**
     *
     * @param string $project
     */
    abstract public function isValid($project);

    /**
     *
     * @param string $project
     */
    abstract public function getName($project);

    /**
     *
     * @param string $project
     */
    abstract public function getVersion($project);

    /**
     *
     * @param string $project
     */
    abstract public function getUrl($project);

    /**
     *
     * @param string $project
     */
    abstract public function getDownloadUrl($project);

}
