<?php

/**
 * Description of utillityClass
 *
 * @author Søren Korsholm Kjeldsen @ soerenkk.dk
 */
class utillityClass
{
    
    public static function create_hash($length=32,$use_upper=1,$use_lower=1,$use_number=1,$use_custom="")
    {

	$upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

	$lower = "abcdefghijklmnopqrstuvwxyz";

	$number = "0123456789";

	if($use_upper){

		$seed_length += 26;

		$seed .= $upper;

	}

	if($use_lower){

		$seed_length += 26;

		$seed .= $lower;

	}

	if($use_number){

		$seed_length += 10;

		$seed .= $number;

	}

	if($use_custom){

		$seed_length +=strlen($use_custom);

		$seed .= $use_custom;

	}

	for($x=1;$x<=$length;$x++){

		$auto_generated_password .= $seed{rand(0,$seed_length-1)};

	}

	return($auto_generated_password);

    }
    
    
    public static function create_unique_hash($length = 48, $use_custom = "")
    {
        
        $custom = $use_custom.time();
        
        $auto_generated_password = self::create_hash($length, 1, 1, 1, $custom);
        
        return($auto_generated_password);

    }
    
    
    public static function create_password($password, $salt = false)
    {
        
        if ($salt)
        {
            $password_to_encrypt = $salt.$password.$salt;
        }
        else
        {
            $password_to_encrypt = $password;
        }
        
        return hash("sha512", $password_to_encrypt);
        
    }


    /**

    Validate an email address.

    Provide email address (raw input)

    Returns true if the email address has the email 

    address format and the domain exists.


    Taken from: http://www.linuxjournal.com/article/9585?page=0,3

    */
    public static function validEmail($email)
    {

       $isValid = true;

       $atIndex = strrpos($email, "@");

       if (is_bool($atIndex) && !$atIndex)

       {

          $isValid = false;

       }

       else

       {

          $domain = substr($email, $atIndex+1);

          $local = substr($email, 0, $atIndex);

          $localLen = strlen($local);

          $domainLen = strlen($domain);

          if ($localLen < 1 || $localLen > 64)

          {

             // local part length exceeded

             $isValid = false;

          }

          else if ($domainLen < 1 || $domainLen > 255)

          {

             // domain part length exceeded

             $isValid = false;

          }

          else if ($local[0] == '.' || $local[$localLen-1] == '.')

          {

             // local part starts or ends with '.'

             $isValid = false;

          }

          else if (preg_match('/\\.\\./', $local))

          {

             // local part has two consecutive dots

             $isValid = false;

          }

          else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))

          {

             // character not valid in domain part

             $isValid = false;

          }

          else if (preg_match('/\\.\\./', $domain))

          {

             // domain part has two consecutive dots

             $isValid = false;

          }

          else if

    (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/',

                     str_replace("\\\\","",$local)))

          {

             // character not valid in local part unless 

             // local part is quoted

             if (!preg_match('/^"(\\\\"|[^"])+"$/',

                 str_replace("\\\\","",$local)))

             {

                $isValid = false;

             }

          }

          if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))

          {

             // domain not found in DNS

             $isValid = false;

          }

       }

       return $isValid;

    }


    public static function is_number($parameter)
    {
        
        if (preg_match('/^\d+$/', $parameter))
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
    
    public static function getip() {

        if (isset($_SERVER)) {

          if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {

            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

          } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {

            $ip = $_SERVER['HTTP_CLIENT_IP'];

          } else {

            $ip = $_SERVER['REMOTE_ADDR'];

          }

        } else {

          if (getenv('HTTP_X_FORWARDED_FOR')) {

            $ip = getenv('HTTP_X_FORWARDED_FOR');

          } elseif (getenv('HTTP_CLIENT_IP')) {

            $ip = getenv('HTTP_CLIENT_IP');

          } else {

            $ip = getenv('REMOTE_ADDR');

          }

        }



        return $ip;

    }


    public static function getSize($size)
    {

        $units = array( 'B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');

        $power = $size > 0 ? floor(log($size, 1024)) : 0;

        return number_format($size / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];

    }


    public static function getSpeed($speed)
    {

        $units = array( 'b', 'Kbit', 'Mbit', 'Gbit', 'Tbit', 'Pbit', 'Ebit', 'Zbit', 'Ybit');

        $power = $speed > 0 ? floor(log($speed, 1024)) : 0;

        return number_format($speed / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];

    }


    public static function getPercent($amount)
    {

        if ($amount == 0)
        {
            return 0;
        }
        elseif ($amount < 10)
        {
            return "0," . $amount;
        }
        elseif ($amount == 1000)
        {
            return 100;
        }
        else
        {

            return substr_replace($amount, ",", -1, 0);

        }

        return number_format($speed / pow(1024, $power), 2, '.', ',') . ' ' . $units[$power];

    }

    public static function loggedinorreturn() {

        global $CURUSER;

        if (!$CURUSER) {

            header("Location: /login/?returnto=" . self::returnto());
            
        }
        else
        {
            
            // Do nothing \\
            return;
            
        }

    }
    
    
    public static function returnto($encode = false)
    {
        
        if ($encode)
        {
            return urlencode($encode);
        }
        else
        {
            return urlencode($_SERVER["REQUEST_URI"]);
        }
        
    }
    
    
    public static function secure_protocol()
    {
        
        global $_SERVER;

        if ($_SERVER['HTTPS'] == "on")
        {

            return true;

        }
        else
        {

            return false;

        }
        
    }
    
    
    // Redirect browser using header or script function
    public static function redirect($location, $script = false)
    {

        if (!$script)
        {

            header("Location: ".BASEDIR.str_replace("&amp;", "&", $location));

            exit;

        }
        else
        {

            echo "<script type='text/javascript'>document.location.href='".BASEDIR.str_replace("&amp;", "&", $location)."'</script>\n";

            exit;

        }

    }

    
}

?>
