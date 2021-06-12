<?php
namespace System;
use System\Application;
class Html 
{
    private $app;
    private $title;
    private $descrpition;
    private $keywords;
    private $class;


    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function settitle($title)
    {
        $this->title = $title;
    }

    public function gettitle()
    {
        return $this->title;
    }
    public function setclass($class)
    {
        $this->class = $class;
    }

    public function getclass()
    {
        return $this->class;
    }
    public function setdesc($descrpition)
    {
        $this->descrpition = $descrpition;
    }

    public function getdesc()
    {
        return $this->descrpition;
    }
    public function setkeywords($keywords)
    {
        $this->tkeywordsitle = $keywords;
    }

    public function getkeywords()
    {
        return $this->keywords;
    }

}