<?php
namespace LauertBernd\JodelClientPHP\Commands;

use LauertBernd\JodelClientPHP\JodelApi\JodelManager;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;
use LauertBernd\JodelClientPHP\JodelApi\Requester;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CreateUser extends Command
{
    protected function configure()
    {
        $this
            ->setName('createuser')
            ->setDescription('Creates new users.')
            ->setHelp("This command allows you to create users...");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);
        $location = new Location();
        $location->setLat(48.148434);
        $location->setLng(11.567867);
        $location->setCityName('Munich');
        $jodelManager = new JodelManager();
        $account = $jodelManager->registerAccount($location);

    }
}