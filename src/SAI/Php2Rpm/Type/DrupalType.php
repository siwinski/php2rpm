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

use SAI\Php2Rpm\Type\AbstractType;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
class DrupalType extends AbstractType
{

    /**
     * @var string
     */
    protected static $regex = '/^(\w+)(-(\d)(.x)?)?(-dev)?$/';

    /**
     * @var int
     */
    protected $api;

    /**
     *
     */
    public function configure()
    {
        $matches = array();
        $this->valid = preg_match(static::$regex, $this->project, $matches);

        if (!$this->valid) {
            return;
        }

        echo "------------------ $this->project\n";
        print_r($matches);

        $this->name = $matches[1];

        $this->url = 'http://drupal.org/project/' . $this->name;

        $this->downloadUrl = 'http://drupal.org/project/' . $this->name;
    }

    /**
     *
     */
//    public function getVersion()
//    {
//        $apiVersion      = preg_replace('/^\w+-?/', '', $this->project);
//        $apiVersionParts = empty($apiVersion) ? array() : explode('-', $apiVersion);
//
//        if (empty($apiVersionParts)) {
//            return '*** TODO ***';
//        }
//
//        if (count($apiVersionParts) > 1) {
//            $api     = str_replace('.x', '', $apiVersionParts[0]);
//            $version = $apiVersionParts[1];
//        } elseif (false !== strpos($apiVersionParts[0], '.x')) {
//            $api     = str_replace('.x', '', $apiVersionParts[0]);
//            $version = null;
//        } else {
//            $api     = null;
//            $version = $apiVersionParts[0];
//        }
//
//        return '*version*';
//    }

}
