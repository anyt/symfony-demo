<?php

namespace Anyt\Bundle\DemoBundle\Model;

/**
 * Class Post
 */
class Post
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $body;


    public function __construct($title, $body)
    {
        $this->setTitle($title);
        $this->setBody($body);
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}