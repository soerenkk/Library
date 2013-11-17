<?php

/**
 * Description of sanitize
 *
 * @author soerenk
 */
class sanitize {
    
    
    public static function sanitize_email($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_EMAIL);
    }
    
    
    public static function sanitize_encoded($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_ENCODED);
    }
    
    
    public static function sanitize_magic_quotes($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_MAGIC_QUOTES);
    }
    
    
    public static function sanitize_float($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_NUMBER_FLOAT);
    }
    
    
    public static function sanitize_int($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_NUMBER_INT);
    }
    
    
    public static function sanitize_special_char($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_SPECIAL_CHARS);
    }
    
    
    public static function sanitize_full_special_char($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }
    
    
    public static function sanitize_string($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_STRING);
    }
    
    
    public static function sanitize_stripped($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_STRIPPED);
    }
    
    
    public static function sanitize_url($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_SANITIZE_URL);
    }
    
    
    public static function sanitize_unsafe_raw($sanitize_this)
    {
        return filter_var($sanitize_this, FILTER_UNSAFE_RAW);
    }
    
    
}

?>
