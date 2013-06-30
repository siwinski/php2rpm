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
    public function __construct(AbstractType $type)
    {
        parent::__construct();
        $this->type = $type->setCommand($this);
    }

    /**
     * @return AbstractType
     */
    public function getType(AbstractType $type)
    {
        return $this->type;
    }

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
                'Project'
            )
            ->addOption(
                'format',
                'f',
                InputOption::VALUE_REQUIRED,
                'Format of spec file to create',
                'fedora'
            )
        ;
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

        $output->writeln(sprintf('<info>Project count</info> = <comment>%d</comment>', count($projects)));
        $output->writeln(sprintf('<info>Type class</info> = <comment>%s</comment>', get_class($this->type)));

        foreach ($projects as $project) {
            $output->writeln("\n<info>$project:</info>");

            $this->type->setProject($project);

            if (!$this->type->isValid($project)) {
                $output->writeln("\t<error>Invalid project</error>");
                continue;
            }

            $output->writeln(sprintf("        <info>Valid?:</info> %s",                    $this->type->isValid($project) ? '<comment>true</comment>' : '<error>false</error>'));
            $output->writeln(sprintf("          <info>Name:</info> <comment>%s</comment>", $this->type->getName($project)));
            $output->writeln(sprintf("           <info>URL:</info> <comment>%s</comment>", $this->type->getUrl($project)));
            $output->writeln(sprintf("       <info>Version:</info> <comment>%s</comment>", $this->type->getVersion($project, $output)));
            $output->writeln(sprintf("  <info>Download URL:</info> <comment>%s</comment>", $this->type->getDownloadUrl($project)));
        }

        throw new \RuntimeException('Not implemented');
    }

}
