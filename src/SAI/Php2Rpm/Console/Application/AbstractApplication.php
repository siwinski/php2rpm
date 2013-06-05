<?php

/**
 * This file is part of the php2rpm package.
 *
 * (c) Shawn Iwinski <shawn.iwinski@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SAI\Php2Rpm\Console\Application;

use Symfony\Component\Console\Application;
use SAI\Php2Rpm\Console\Command\CreateCommand;
use SAI\Php2Rpm\Type\AbstractType;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
abstract class AbstractApplication extends Application
{
    /**
     * ASCII art logo
     * @var string
     */
    protected static $logo = '';

    /**
     * {@inheritDoc}
     */
    public function getHelp()
    {
      return '<info>' . static::$logo . '</info>' . parent::getHelp();
    }

    /**
     * Initializes default commands
     */
    protected function getDefaultCommands()
    {
        // Keep the core default commands
        $commands = parent::getDefaultCommands();

        // Add the create command
        $commands[] = new CreateCommand($this->getType());

        return $commands;
    }

    /**
     * @return AbstractType
     */
    abstract public function getType();

}
