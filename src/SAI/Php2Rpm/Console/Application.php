<?php

/**
 * This file is part of the php2rpm package.
 *
 * (c) Shawn Iwinski <shawn.iwinski@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SAI\Php2Rpm\Console;

use Symfony\Component\Console\Application as BaseApplication;

use SAI\Php2Rpm;
use SAI\Php2Rpm\Console\Command\CreateCommand;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
class Application extends BaseApplication
{
    /**
     * ASCII art logo
     * @link http://patorjk.com/software/taag/#p=display&f=Standard&t=php2rpm
     */
    private static $logo = "        _          ____
  _ __ | |__  _ __|___ \ _ __ _ __  _ __ ___
 | '_ \| '_ \| '_ \ __) | '__| '_ \| '_ ` _ \
 | |_) | | | | |_) / __/| |  | |_) | | | | | |
 | .__/|_| |_| .__/_____|_|  | .__/|_| |_| |_|
 |_|         |_|             |_|

";

    /**
     *
     */
    public function __construct()
    {
        parent::__construct('php2rpm', Php2Rpm::VERSION);
    }

    /**
     * {@inheritDoc}
     */
    public function getHelp()
    {
      return self::$logo . parent::getHelp();
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
