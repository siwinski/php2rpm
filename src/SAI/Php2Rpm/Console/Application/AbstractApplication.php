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

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
abstract class AbstractApplication extends Application
{
    /**
     * ASCII art logo
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
     * Initializes all commands
     */
    protected function getDefaultCommands()
    {
        // Keep the core default commands
        $commands = parent::getDefaultCommands();

        // Add commands
        $commands[] = new CreateCommand();

        return $commands;
    }

}
