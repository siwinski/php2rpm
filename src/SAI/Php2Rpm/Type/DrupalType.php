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

    protected static $regex = '/^(\w+)(-\d(.x)?)?(-[0-9.]+)?$/';

    public function isValid($project)
    {
        if (!preg_match(static::$regex, $project)) {
            return false;
        }

        return true;
    }

    public function getName($project)
    {
        return $this->normalizeProject($project);
    }

    public function getVersion($project)
    {
        $apiVersion      = preg_replace('/^\w+-?/', '', $project);
        $apiVersionParts = empty($apiVersion) ? array() : explode('-', $apiVersion);

        if (empty($apiVersionParts)) {
            return '*** TODO ***';
        }

        if (count($apiVersionParts) > 1) {
            $api     = str_replace('.x', '', $apiVersionParts[0]);
            $version = $apiVersionParts[1];
        } elseif (false !== strpos($apiVersionParts[0], '.x')) {
            $api     = str_replace('.x', '', $apiVersionParts[0]);
            $version = null;
        } else {
            $api     = null;
            $version = $apiVersionParts[0];
        }

        return '*version*';
    }

    public function getUrl($project)
    {
        return 'http://drupal.org/project/' . $this->normalizeProject($project);
    }

    public function getDownloadUrl($project)
    {
        return 'http://drupal.org/project/' . $this->normalizeProject($project);
    }

}
