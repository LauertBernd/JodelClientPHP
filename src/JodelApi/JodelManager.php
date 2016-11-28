<?php
namespace LauertBernd\JodelClientPHP\JodelApi;

use LauertBernd\JodelClientPHP\JodelApi\Model\AccountData;
use LauertBernd\JodelClientPHP\JodelApi\Model\DetailPost;
use LauertBernd\JodelClientPHP\JodelApi\Model\Location;
use LauertBernd\JodelClientPHP\JodelApi\Model\Post;
use LauertBernd\JodelClientPHP\JodelApi\Requests\CreateUserRequest;
use LauertBernd\JodelClientPHP\JodelApi\Requests\GetDetails;
use LauertBernd\JodelClientPHP\JodelApi\Requests\GetNewPosts;
use LauertBernd\JodelClientPHP\JodelApi\Requests\GetPosts;

class JodelManager
{
    const POSTS_NORMAL = 1;
    const POSTS_LOUDEST = 2;
    const POSTS_NEWEST = 3;
    const POSTS_MOSTDISCUSSED = 4;

    /**
     * @var AccountData
     */
    protected $accountData;

    /**
     * @param AccountData $accountData
     */
    public function setAccountData(AccountData $accountData)
    {
        $this->accountData = $accountData;
    }

    /**
     * @return AccountData
     */
    public function registerAccount(Location $location)
    {

        $accountCreator = new CreateUserRequest();
        $accountCreator->setLocation($location);
        $data = $accountCreator->execute();
        var_dump($data);
        $account = new AccountData();
        //$account->setAccessToken('')
        // TODO : Fill Data to the Account


        return $account;
    }

    /**
     * @return DetailPost[]
     */
    public function getPostsWithComments($postsType = self::POSTS_NORMAL)
    {
        $posts = $this->getPosts($postsType);
        $detailsPost = array();
        foreach ($posts as $post) {
            $detailsPost[] = $this->getDetails($post);
        }
        return $detailsPost;
    }

    /**
     * @return Post[]
     */
    public function getPosts($postsType = self::POSTS_NORMAL)
    {
        $this->checkAccountData();
        switch ($postsType){
            case self::POSTS_NEWEST:
                $request = new GetNewPosts();
                break;
            case self::POSTS_NORMAL:
                $request = new GetPosts();
                break;
            default:
                throw new \Exception('Unknown Posts Type');
        }

        $request->setAccessToken($this->accountData->getAccessToken());
        $data = $request->execute();
        $posts = array();
        foreach ($data['posts'] as $postData) {
            $posts[] = new Post($postData);
            //var_dump($postData);
        }
        //print_r($posts);
        return $posts;
    }

    private function checkAccountData()
    {
        if ($this->accountData == null) {
            throw new \Exception('No Account data');
        }
    }

    /**
     * @param Post $post
     * @return DetailPost
     */
    public function getDetails(Post $post)
    {
        $this->checkAccountData();
        $request = new GetDetails();
        $request->setPostId($post->getId());
        $request->setAccessToken($this->accountData->getAccessToken());
        $data = $request->execute();
        //var_dump($data);
        //die();
        $detailPost = new DetailPost($data);
        return $detailPost;
    }
}