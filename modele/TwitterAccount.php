<?php
require_once('Tweet.php');

class TwitterAccount
{
    /**
     * @var string
     */
    private $twitterAccount;

    /**
     * @var image
     */
    private $twitterAvatar;

    /**
     * @var string
     */
    private $accountDescription;

    /**
     * @var string
     */
    private $accountUrl;

    /**
     * @var array
     */
    private $tweetList;


     public function __construct(array $data)
    {
			$this->twitterAccount = $data[0]['user']['name'];
			$this->twitterAvatar = $data[0]['user']['profile_image_url'];
			$this->accountDescription = $data[0]['user']['description'];
			$this->accountUrl = "http://twitter.com/".$data[0]['user']['screen_name'];
			
			$this->tweetList = array();
			
			foreach($data as $items)
    		{
    			//list of tweet without reply and retweet
    			if(!$items['retweeted']== 'TRUE' && $items['in_reply_to_status_id'] == null){
					array_push($this->tweetList, new Tweet($items));
				}
			}
    }

    public function getTwitterAccount()
    {
    	return $this->twitterAccount;
    }

    public function getTwitterAvatar()
    {
    	return $this->twitterAvatar;
    }

    public function getAccountDescription()
    {
    	return $this->accountDescription;
    }

    public function getAccountUrl()
    {
    	return $this->accountUrl;
    }

    public function getTweetList()
    {
    	return $this->tweetList;
    }
 }

?>