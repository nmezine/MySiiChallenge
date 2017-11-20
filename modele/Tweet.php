<?php

class Tweet
{
    /**
     * @var string
     */
    private $textTweet;

    /**
     * @var string
     */
    private $dateTweet;

    /**
     * @var string
     */
    private $linkTweet;

    /**
     * @var string
     */
    private $mediaTweet;


    public function __construct(array $data)
    {
    	$this->textTweet = $data['text'];
    	$this->dateTweet = $data['created_at'];
		$this->linkTweet = $data['id_str'];
       // $this->mediaTweet = $data['media_id_string'];
    }

    public function getTextTweet()
    {
    	return $this->textTweet;
    }

    public function getDateTweet()
    {
		return date("Y.m.d H:i", strtotime($this->dateTweet));
    }

    public function getLinkTweet()
    {
    	return $this->linkTweet;
    }

    public function getMediaTweet()
    {
    	return $this->mediaTweet;
    }

}

?>