<?php

class Fungsi {

    protected $ci;

    public function __construct(){
        $this->ci =& get_instance();
    }

    function limit_words($string, $word_limit){
        $words = explode(" ",$string);
        return implode(" ",array_splice($words,0,$word_limit));
    }
}