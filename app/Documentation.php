<?php

namespace App;

class Documentation
{
    protected $content;
    protected $version;


    public function __construct($content,$version)
    {
        $this->setContent($content);
        $this->setVersion($version);
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setVersion($version)
    {
        $this->version = $version;
    }

    public function getVersion()
    {
        return $this->version;
    }

}