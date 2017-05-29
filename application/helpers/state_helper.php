<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * State Dropdown
 *
 * Returns HTML for a dropdown filled with state information
 *
 * @access public
 * @param string $name     Value of <select>'s name attribute
 * @param string $selected Value of <option> to be selected
 * @param string $id       Value of <select>'s id attribute (optional)
 * @param string $class    Value of <select>'s class attribute (optional)
 * @return string
 * <? echo state_dropdown('state'); ?>
 */
if (!function_exists('state_dropdown')) {

    function state_dropdown($name = 'state', $selected = NULL, $id = NULL, $class = NULL) {
        $CI = & get_instance();

        $CI->load->helper('form');

        $state_list = state_array();

        $extra = '';
        if (!is_null($id)) {
            $extra .= 'id="' . $id . '" ';
        }
        if (!is_null($class)) {
            $extra .= 'class="' . $class . '" ';
        }
        $extra = substr($extra, 0, -1);

        return form_dropdown($name, $state_list, $selected, $extra);
    }

}

/**
 * Convert from abbreviation
 *
 * Convert a state abbreviation to the full state name
 *
 * @access public
 * @param string $abbr Two-letter abbreviation
 * @return string
 * <? echo abbr_to_name('CA'); ?>
 */
if (!function_exists('abbr_to_name')) {

    function abbr_to_name($abbr) {
        $state_list = state_array();
        $abbr = strtoupper($abbr);

        return isset($state_list[$abbr]) ? $state_list[$abbr] : FALSE;
    }

}

/**
 * Convert to abbreviation
 *
 * Convert a full state name to the state abbreviation
 *
 * @access public
 * @param  string $name States full name
 * @return string/boolean Returns FALSE when not found
 * <? echo name_to_abbr('California'); ?>
 */
if (!function_exists('name_to_abbr')) {

    function name_to_abbr($name) {
        $state_list = state_array();
        $camel_name = ucwords(strtolower($name));

        return array_search($camel_name, $state_list);
    }

}

/**
 * Check for valid state
 *
 * Check to see if a provided state exists
 *
 * @access public
 * @param  string $str Two-letter abbreviation OR full state name
 * @return boolean
 * <? echo is_valid_state('California') ? "Correct" : "Bad"; ?>
 * <? echo is_valid_state('CA') ? "Correct" : "Bad"; ?>
 */
if (!function_exists('is_valid_state')) {

    function is_valid_state($str) {
        $state_list = state_array();
        $camel_str = ucwords(strtolower($str));

        return array_key_exists($str, $state_list) || in_array($camel_str, $state_list);
    }

}

/**
 * State array
 *
 * Return an array of states with their abbreviation as the key
 *
 * @access public
 * @return string
 * <? echo state_array(); ?>
 */
if (!function_exists('get_states')) {

    function state_array() {
        $state_list = array(
            'Alabama' => 'Alabama',
            'Alaska' => 'Alaska',
            'Arizona' => 'Arizona',
            'Arkansas' => 'Arkansas',
            'California' => 'California',
            'Colorado' => 'Colorado',
            'Connecticut' => 'Connecticut',
            'Delaware' => 'Delaware',
            'District Of Columbia' => 'District Of Columbia',
            'Florida' => 'Florida',
            'Georgia' => 'Georgia',
            'Hawaii' => 'Hawaii',
            'Idaho' => 'Idaho',
            'Illinois' => 'Illinois',
            'Indiana' => 'Indiana',
            'Iowa' => 'Iowa',
            'Kansas' => 'Kansas',
            'Kentucky' => 'Kentucky',
            'Louisiana' => 'Louisiana',
            'Maine' => 'Maine',
            'Maryland' => 'Maryland',
            'Massachusetts' => 'Massachusetts',
            'Michigan' => 'Michigan',
            'Minnesota' => 'Minnesota',
            'Mississippi' => 'Mississippi',
            'Missouri' => 'Missouri',
            'Montana' => 'Montana',
            'Nebraska' => 'Nebraska',
            'Nevada' => 'Nevada',
            'New Hampshire' => 'New Hampshire',
            'New Jersey' => 'New Jersey',
            'New Mexico' => 'New Mexico',
            'New York' => 'New York',
            'North Carolina' => 'North Carolina',
            'North Dakota' => 'North Dakota',
            'Ohio' => 'Ohio',
            'Oklahoma' => 'Oklahoma',
            'Oregon' => 'Oregon',
            'Pennsylvania' => 'Pennsylvania',
            'Rhode Island' => 'Rhode Island',
            'South Carolina' => 'South Carolina',
            'South Dakota' => 'South Dakota',
            'Tennessee' => 'Tennessee',
            'Texas' => 'Texas',
            'Utah' => 'Utah',
            'Vermont' => 'Vermont',
            'Virginia' => 'Virginia',
            'Washington' => 'Washington',
            'West Virginia' => 'West Virginia',
            'Wisconsin' => 'Wisconsin',
            'Wyoming' => 'Wyoming'
        );

        return $state_list;
    }

}
?>
