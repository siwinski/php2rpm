<?php

/**
 * This file is part of the php2rpm package.
 *
 * (c) Shawn Iwinski <shawn.iwinski@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SAI\Php2Rpm\Console\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
class CreateCommand extends Command
{

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('create')
            ->setDescription('Creates RPM spec')
            ->addOption(
                'type',
                't',
                InputOption::VALUE_REQUIRED,
                'Type of source (php|pear|composer|drupal)',
                'php'
            )
            ->addOption(
                'format',
                'f',
                InputOption::VALUE_REQUIRED,
                'Format of spec file to create (fedora)',
                'fedora'
            )
        ;
    }

    /**
     *
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        throw new \Exception('Not implemented');
    }

}
