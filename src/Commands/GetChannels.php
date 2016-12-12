<?php
namespace LauertBernd\JodelClientPHP\Commands;

use LauertBernd\JodelClientPHP\JodelApi\JodelManager;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
class GetChannels extends Command
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

        $jodelManager = new JodelManager();
        $accountData = new AccountData();
        $accountData->loadFromJson(file_get_contents("account.json"));

    }
}