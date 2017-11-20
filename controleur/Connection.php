<?php
require_once('modele/TwitterAPIExchange.php');

class Connection
{

	/**
     * @var array
     */
    private $settings;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $requestMethod;

	/**
     * @var TwitterAPIExchange
     */
    private $twitter;


    //Constructeur de connection
    public function __construct()
    {

		$this->settings = array(
		'oauth_access_token' => "X",
		'oauth_access_token_secret' => "X",
		'consumer_key' => "X",
		'consumer_secret' => "X"
		);

		$this->url 			= "https://api.twitter.com/1.1/statuses/user_timeline.json";
		$this->requestMethod 	= "GET";
		$this->twitter 		= new TwitterAPIExchange($this->settings);
	}

	public function getUrl(){
		return $this->url;
	}

	public function getRequestMethod(){
		return $this->requestMethod;
	}

	public function getTwitter(){
		return $this->twitter;
	}
}

?>