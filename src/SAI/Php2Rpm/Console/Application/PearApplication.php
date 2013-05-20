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
use SAI\Php2Rpm\Type\PearType;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
class PearApplication extends AbstractApplication
{

    /**
     * {@inheritDoc}
     * @link http://patorjk.com/software/taag/#p=display&f=Standard&t=pear2rpm
     */
    protected static $logo = "                       ____
  _ __   ___  __ _ _ _|___ \ _ __ _ __  _ __ ___
 | '_ \ / _ \/ _` | '__|__) | '__| '_ \| '_ ` _ \
 | |_) |  __/ (_| | |  / __/| |  | |_) | | | | | |
 | .__/ \___|\__,_|_| |_____|_|  | .__/|_| |_| |_|
 |_|                             |_|

";

    /**
     * @var PearType
     */
    protected static $type = null;

    /**
     *
     */
    public function __construct()
    {
        parent::__construct('pear2rpm', Php2Rpm::VERSION);
    }

    /**
     * @return PearType
     */
    public function getType()
    {
        if (!isset(static::$type)) {
            static::$type = new PearType();
        }

        return static::$type;
    }

}
