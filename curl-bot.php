<?php

#
# Description of bot
#
# @author søren
#

class bot
{
    
    # Variabler for CuRL #
    private $_url = "";
    private $_port = 80;
    private $_userAgent = "This is my bot, please let me in (for abuse sent an email to: abuse@soerenkk.dk)";
    private $_post = false;
    private $_postFields = "";
    private $_timeout = 300;
    private $_cookieFileLocation = "cookie.txt";
    private $_referer = "https://www.google.com/?q=";
    private $_maxRedirects = 3;
    private $_followLocation = true;
    private $_includeHeader = false;
    private $_resetSession = false;
    
    
    # CuRL returns #
    private $_webpage = NULL;
    private $_status = NULL;
    
    
    # Magic methods #
    public function __construct($url = NULL)
    {
        
        if ($url)
        {
            $this->setUrl($url);
        }

    }
    
    public function __tostring()
    {
        return $this;
    }
    
    
    
    
    
    # Do CuRL #
    public function docurl()
    {
        
        # Initiate the CuRL #
        $s = curl_init();
        
        # Declare the URL #
        curl_setopt($s,CURLOPT_URL,$this->_url);
        
        # Declare the port to use #
        curl_setopt($s,CURLOPT_PORT,$this->_port);
        
        
        //         curl_setopt($s,CURLOPT_HTTPHEADER,array('Expect:'));
        
        # Set timeout #
        curl_setopt($s,CURLOPT_TIMEOUT,$this->_timeout);
        
        # Be able to show the returned web site #
        curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
        
        # Max times to be redirected #
        curl_setopt($s,CURLOPT_MAXREDIRS,$this->_maxRedirects);
        
        # Accept to be redirected by a php header("location: x") #
        curl_setopt($s,CURLOPT_FOLLOWLOCATION,$this->_followLocation);
        
        # Where do we want to save cookies and sessions to #
        curl_setopt($s,CURLOPT_COOKIEJAR,$this->_cookieFileLocation);
        
        # Where to load cookies and sessions from #
        curl_setopt($s,CURLOPT_COOKIEFILE,$this->_cookieFileLocation);
        
        # If $this->_post is true, then we have some data to post to the requested page #
        if ($this->_post)
        {
            
            # Declare that we have something to post #
            curl_setopt($s,CURLOPT_POST,true);
            
            # Post the things that we will post #
            curl_setopt($s,CURLOPT_POSTFIELDS,$this->_postFields);
            
        }

        # If $this->_post is true, then we tell libcurl that it should not send the session cookie #
        if ($this->_resetSession)
        {
            # Declare not to sent session cookie #
            curl_setopt($s,CURLOPT_COOKIESESSION,true);
        }

        if($this->_includeHeader)
        {
            curl_setopt($s,CURLOPT_HEADER,true);
        }

        //         if($this->_noBody)
        //         {
        //             curl_setopt($s,CURLOPT_NOBODY,true);
        //         }
        //         

        curl_setopt($s,CURLOPT_USERAGENT,$this->_userAgent);
        curl_setopt($s,CURLOPT_REFERER,$this->_referer);

        $this->_webpage = curl_exec($s);
        $this->_status = curl_getinfo($s,CURLINFO_HTTP_CODE);
        
        copy($this->getUrl(), "img/img.jpg");
        
        curl_close($s);
        
    }
    
    
    
    # Do CuRL backup #
    public function docurlbackup()
    {
        
         $s = curl_init();

         curl_setopt($s,CURLOPT_URL,$this->_url);
//         curl_setopt($s,CURLOPT_HTTPHEADER,array('Expect:'));
         curl_setopt($s,CURLOPT_TIMEOUT,$this->_timeout);
//         curl_setopt($s,CURLOPT_MAXREDIRS,$this->_maxRedirects);
         curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
         curl_setopt($s,CURLOPT_FOLLOWLOCATION,$this->_followlocation);
         curl_setopt($s,CURLOPT_COOKIEJAR,$this->_cookieFileLocation);
         curl_setopt($s,CURLOPT_COOKIEFILE,$this->_cookieFileLocation);

//         if($this->authentication == 1){
//           curl_setopt($s, CURLOPT_USERPWD, $this->auth_name.':'.$this->auth_pass);
//         }
//         
//         if($this->_post)
//         {
             curl_setopt($s,CURLOPT_POST,true);
             curl_setopt($s,CURLOPT_POSTFIELDS,"ip=".$this->_ip);
//         }
//
//         if($this->_includeHeader)
//         {
//               curl_setopt($s,CURLOPT_HEADER,true);
//         }
//
//         if($this->_noBody)
//         {
//             curl_setopt($s,CURLOPT_NOBODY,true);
//         }
//         
//         if($this->_binary)
//         {
//             curl_setopt($s,CURLOPT_BINARYTRANSFER,true);
//         }
//         
         
         curl_setopt($s,CURLOPT_USERAGENT,$this->_useragent);
         curl_setopt($s,CURLOPT_REFERER,$this->_referer);

        $this->_webpage = curl_exec($s);
        $this->_status = curl_getinfo($s,CURLINFO_HTTP_CODE);
        curl_close($s);
        
    }
    
    
    
    # HTTP functions #
    public function getHttpStatus()
    {
        return $this->_status;
    }

    public function getWebpage()
    {
        return $this->_webpage;
    }

    
    
    # Set & Get methods #
    public function setUrl($x)
    {
        $this->_url = $x;
    }
    
    
    public function getUrl()
    {
        return $this->_url;
    }
    
    
    public function setPort($x)
    {
        $this->_port = $x;
    }
    
    
    public function getPort()
    {
        return $this->_port;
    }
    
    
    public function setUseragent($x)
    {
        $this->_userAgent = $x;
    }
    
    
    public function getUseragent()
    {
        return $this->_userAgent;
    }
    
    
    public function setTimeout($x)
    {
        $this->_timeout = $x;
    }
    
    
    public function getTimeout()
    {
        return $this->_timeout;
    }
    
    
    public function setCookiefilelocation($x)
    {
        $this->_cookieFileLocation = $x;
    }
    
    
    public function getCookiefilelocation()
    {
        return $this->_cookieFileLocation;
    }
    
    
    public function setReferer($x)
    {
        $this->_referer = $x;
    }
    
    
    public function getReferer()
    {
        return $this->_referer;
    }
    
    
    public function setResetsession($x)
    {
        $this->_resetSession = $x;
    }
    
    
    public function getResetsession()
    {
        return $this->_resetSession;
    }
    
    
    public function setPost($x)
    {
        
        foreach($x as $key => $value)
        {
            $fields_string .= $key.'='.$value.'&';
        }
        
        rtrim($fields_string, '&');
        
        # Set that we want to post something #
        $this->_post = true;
        
        # Set the string that we will post #
        $this->_postFields = $fields_string;
        
    }
    
    
    public function getPost()
    {
        return $this->_postFields;
    }
    
    

    
    
}

?>
