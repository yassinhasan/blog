<?php
namespace System\View;

interface ViewInterface 
{
    public function getoutput();
    public function __toString();
}