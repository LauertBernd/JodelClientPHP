<?php
namespace LauertBernd\JodelClientPHP\Commands;

use LauertBernd\JodelClientPHP\JodelApi\JodelManager;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
class GetChannels extends GetPosts
{
    protected function configure()
    {
        $this
            ->setName('getchannelinfo')
            ->setDescription('getchannel')
            ->setHelp("getchannel");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->postType= JodelManager::POSTS_CHANNEL;
        parent::execute($input,$output);
        //var_dump($posts);
    }
}