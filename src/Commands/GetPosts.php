<?php
namespace LauertBernd\JodelClientPHP\Commands;

use LauertBernd\JodelClientPHP\JodelApi\Exceptions\StatusError;
use LauertBernd\JodelClientPHP\JodelApi\JodelManager;
use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;

class GetPosts extends Command
{
    protected $postType = JodelManager::POSTS_NORMAL;
    protected function configure()
    {
        $this
            ->setName('getposts')
            ->setDescription('Gets new Posts')
            ->setHelp("gets new Posts");

    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {


        $jodelManager = new JodelManager();
        $accountData = new AccountData();
        $accountData->loadFromJson(file_get_contents("account.json"));


        $jodelManager->setAccountData($accountData);
        try {
            $posts = $jodelManager->getPostsWithComments($this->postType);
        } catch (StatusError $e) {
            var_dump($e->getResult());
        }

        foreach ($posts as $post) {

            $output->writeln("################");
            $output->writeln("---------------");
            $str = sprintf('%s : %s', $post->getId(), $post->getText());
            var_dump($post->getCreatedAt()->getTimestamp());
            if ($post->hasImage()) {

                //$image = $jodelManager->getImageBinary($post);
                //echo $image;
                //die();
            }
            $output->writeln($str);
            $output->writeln("---------------");

            $comments = $post->getChildren();
            foreach ($comments as $comment) {
                $output->writeln("Kommentar:".$comment->getUserId() ."   ". $comment->getText());
            }


            $output->writeln("################");


        }
    }
}