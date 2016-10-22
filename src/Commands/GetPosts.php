<?php
namespace LauertBernd\JodelClientPHP\Commands;

use LauertBernd\JodelClientPHP\JodelApi\JodelManager;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
class GetPosts extends Command
{
    protected function configure()
    {
        $this
            ->setName('getposts')
            ->setDescription('Gets new Posts')
            ->setHelp("gets new Posts")
            ->addArgument('accesstoken', InputArgument::REQUIRED, 'Accesstoken');

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $jodelManager = new JodelManager();
        $accountData = new AccountData();
        $accountData->setAccessToken($input->getArgument('accesstoken'));
        $posts = $jodelManager->getPosts($accountData);
        var_dump($posts);
    }
}