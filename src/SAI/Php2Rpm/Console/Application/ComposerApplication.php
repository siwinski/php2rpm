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

use SAI\Php2Rpm;
use SAI\Php2Rpm\Console\Application\AbstractApplication;
use SAI\Php2Rpm\Type\ComposerType;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
class ComposerApplication extends AbstractApplication
{

    /**
     * {@inheritDoc}
     * @link http://patorjk.com/software/taag/#p=display&f=Standard&t=composer2rpm
     */
    protected static $logo = "                                               ____
   ___ ___  _ __ ___  _ __   ___  ___  ___ _ _|___ \ _ __ _ __  _ __ ___
  / __/ _ \| '_ ` _ \| '_ \ / _ \/ __|/ _ \ '__|__) | '__| '_ \| '_ ` _ \
 | (_| (_) | | | | | | |_) | (_) \__ \  __/ |  / __/| |  | |_) | | | | | |
  \___\___/|_| |_| |_| .__/ \___/|___/\___|_| |_____|_|  | .__/|_| |_| |_|
                     |_|                                 |_|

";

    /**
     * @var SAI\Php2Rpm\Type\ComposerType
     */
    protected static $type = null;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct('composer2rpm', Php2Rpm::VERSION);
    }

    /**
     * @return SAI\Php2Rpm\Type\ComposerType
     */
    public function getType()
    {
        if (!isset(static::$type)) {
            static::$type = new ComposerType();
        }

        return static::$type;
    }

}
