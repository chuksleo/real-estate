<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Validation extends CI_Form_validation{
    public  function __construct()
	{

	}


    public function valid_email($str){

            if (function_exists('idn_to_ascii') && preg_match('#\A([^@]+)@(.+)\z#', $str, $matches))
            {
                $variant = defined('INTL_IDNA_VARIANT_UTS46') ? INTL_IDNA_VARIANT_UTS46 : INTL_IDNA_VARIANT_2003;
                $str = $matches[1].'@'.idn_to_ascii($matches[2], 0, $variant);
            }
            return (bool) filter_var($str, FILTER_VALIDATE_EMAIL);
        } 

    }


