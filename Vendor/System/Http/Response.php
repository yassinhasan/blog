<?php
namespace System\Http;
use System\Application;
class Response 
{

        private $output;
        private $headers = [];
        private $app;
        private $content = "";

        public function __construct(Application $app)
        {
            $this->app = $app;
        }

        public function setoutput($content)
        {
            $this->content = $content;
        }
        public function send_output()
        {

           echo $this->content;
        }


        public function setheaders($key,$value)
        {
            return $this->headers[$key] = $value;
        }

        // header ("name: hasan");

        public function sendheaders()
        {
            foreach($this->headers as $header => $value)
            {
                header("$header: $value");
            }
        }

        public function send()
        {
            $this->sendheaders();
            $this->send_output();
        }

}
