<?php

if ( ! defined('BASEPATH'))

    exit('No direct script access allowed');

if(!function_exists('asset_path')){
    function asset_path($nom=''){
        return rtrim(APPPATH, '/') . '/assets/' . $nom;
    }
}

if ( ! function_exists('css_url')) {
    function css_url($nom) {
        echo base_url() . 'assets/css/' . $nom . '.css';
    }
}



if ( ! function_exists('vendor_url')) {
    function vendor_url($nom) {
        echo base_url() . 'assets/vendor/' . $nom ;
    }
}

if ( ! function_exists('js_url')) {
    function js_url($nom) {
        echo base_url() . 'assets/js/' . $nom . '.js';
    }
}

if ( ! function_exists('img_url')) {
    function img_url($nom) {
    echo base_url() . 'assets/img/' . $nom;
    }
}

if ( ! function_exists('document_url')) {
    function document_url($nom) {
        return base_url() . 'assets/documents/' . $nom;
    }
}

if ( ! function_exists('img')) {
    function img($nom, $alt = '') {
        return '<img src="' . img_url($nom) . '" alt="' . $alt . '" />';
    }
}

if ( ! function_exists('json_url')) {
    function json_url($nom) {
        return base_url() . 'assets/json/' . $nom . '.json';
    }
}

if ( ! function_exists('upload_url')) {
    function upload_url($nom) {
        return base_url() . 'assets/uploads/' . $nom;
    }
}






