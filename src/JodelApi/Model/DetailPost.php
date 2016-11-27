<?php
namespace LauertBernd\JodelClientPHP\JodelApi\Model;
class DetailPost extends Post
{

    /**
     * @return Post[]
     */
    public function getChildren(){
        $posts = array();
        if(!isset($this->rawData["children"])){
            return array();
        }
        foreach($this->rawData["children"] as $child){
            $posts[] = new Post($child);
        }
        return $posts;
    }
}