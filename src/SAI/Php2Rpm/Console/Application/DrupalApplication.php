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

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
class DrupalApplication extends AbstractApplication
{

    /**
     * {@inheritDoc}
     * @link http://patorjk.com/software/taag/#p=display&f=Standard&t=drupal2rpm
     */
    protected static $logo = "      _                        _ ____
   __| |_ __ _   _ _ __   __ _| |___ \ _ __ _ __  _ __ ___
  / _` | '__| | | | '_ \ / _` | | __) | '__| '_ \| '_ ` _ \
 | (_| | |  | |_| | |_) | (_| | |/ __/| |  | |_) | | | | | |
  \__,_|_|   \__,_| .__/ \__,_|_|_____|_|  | .__/|_| |_| |_|
                  |_|                      |_|

";

    /**
     *
     */
    public function __construct()
    {
        parent::__construct('drupal2rpm', Php2Rpm::VERSION);
    }

}
