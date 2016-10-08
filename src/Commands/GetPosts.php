<?php
namespace LauertBernd\JodelClientPHP\Commands;

use LauertBernd\JodelClientPHP\JodelApi\Requester;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetPosts extends Command
{
    protected function configure()
    {
        $this
            ->setName('getposts')
            ->setDescription('Gets new Posts')
            ->setHelp("gets new Posts");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}