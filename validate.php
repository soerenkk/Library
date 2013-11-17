<?php

/**
 * Description of validate
 *
 * @author soerenk
 */
class validate {
    
    public function __construct()
    {
        
        
        
    }
    
    public static function validate_bool($validate_this)
    {
        return filter_var($validate_this, FILTER_VALIDATE_BOOLEAN);
    }
    
    
    public static function validate_email($validate_this)
    {
        return filter_var($validate_this, FILTER_VALIDATE_EMAIL);
    }
    
    
    public static function validate_float($validate_this)
    {
        return filter_var($validate_this, FILTER_VALIDATE_FLOAT);
    }
    
    
    public static function validate_int($validate_this, $min = NULL, $max = NULL)
    {
        
        $options = array("options");
        
        if ($min !== NULL)
        {
            $options['options']['min_range'] = $min;
        }
        
        if ($max !== NULL)
        {
            $options['options']['max_range'] = $max;
        }
        
//        if (($min !== NULL) OR ($max !== NULL))
//        {
//            
//            $options = array("options"=>array("min_range"=>$min, "max_range"=>$max));
//            
//            echo "<pre>";
//            print_r($options);
//            echo "</pre>";
//            
//            return filter_var($validate_this, FILTER_VALIDATE_INT, $options);
//            
//        }
//        else
//        {
//            return filter_var($validate_this, FILTER_VALIDATE_INT, $options);
//        }
        
        return filter_var($validate_this, FILTER_VALIDATE_INT, $options);
        
    }
    
    
    public static function validate_ip($validate_this)
    {
        return filter_var($validate_this, FILTER_VALIDATE_IP);
    }
    
    
    public static function validate_regexp($validate_this, $regexp)
    {
        
        $options = array("options"=>array("regexp"=>$regexp));
        
        return filter_var($validate_this, FILTER_VALIDATE_REGEXP, $options);
    }
    
    
    public static function validate_url($validate_this)
    {
        return filter_var($validate_this, FILTER_VALIDATE_URL);
    }
    
    
}

?>
