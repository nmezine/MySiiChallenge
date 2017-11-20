<?php

class TwitterLoaded
{

	/**
     * @var TwitterLoaded singleton
     */
	private static $_instance = null;

	/**
     * @var array TwitterAccount
     */
    private $twitterLoadedList;

    public function __construct()
    { 
    	$this->twitterLoadedList = array();
    }

    public static function getInstance()
    {
    	if(is_null(self::$_instance)){
  			self::$_instance = new TwitterLoaded();
		}
    	return self::$_instance;
    }

    public function getTwitterLoadedList()
    {
    	return $this->twitterLoadedList;
    }

    public function setTwitterLoadedList($data)
    {
    	return $this->twitterLoadedList = $data;
    }

    public function addTwitterLoadedList($data)
    {
    	array_push($this->twitterLoadedList, $data);
    }


}