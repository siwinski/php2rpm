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
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use SAI\Php2Rpm\Type\AbstractType;

/**
 * @author Shawn Iwinski <shawn.iwinski@gmail.com>
 */
class CreateCommand extends Command
{
    /**
     * @var AbstractType
     */
    protected $type;

    /**
     *
     */
    protected function configure()
    {
        $this
            ->setName('create')
            ->setDescription('Creates RPM spec')
            ->addArgument(
                'project',
                InputArgument::IS_ARRAY | InputArgument::REQUIRED,
                'Project(s)'
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
     * Sets the type instance for this command.
     *
     * @param AbstractType $type
     *
     * @return CreateCommand The current instance
     */
    public function setType(AbstractType $type) {
        $this->type = $type;
        return $this;
    }

    /**
     * Gets the type instance of this command.
     *
     * @return AbstractType The type instance of this command
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @throws \RuntimeException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        if (!isset($this->type)) {
            throw new \RuntimeException('Type instance not set.');
        }

        $projects = $input->getArgument('project');

        $output->writeln(sprintf('<info>Projects (%d):</info>', count($projects)));
        foreach ($projects as $p) {
            $output->writeln('    ' . $p);
        }

        $output->writeln(sprintf('<info>Type class: %s', get_class($this->type)));

        throw new \RuntimeException('Not implemented');
    }

}
