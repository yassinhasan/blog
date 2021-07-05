<?php
namespace System\Http;
use System\Application;
class Response 
{

        // this output will come from $this->load->action($controller,$action,$args)
        // wchcil will return function come from this method
        // this function i need to comvert this output to string then echo this output

        private $output;
        private $headers = [];
        private $app;
        private $content = "";

        public function __construct(Application $app)
        {
            $this->app = $app;
        }
        
        
        // this output will come from $this->load->action($controller,$action,$args)
        // wchcil will return function come from this method
        // this function i need to comvert this output to string then echo this output
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
