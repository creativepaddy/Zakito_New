<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Custompage extends MX_Controller
{

function __construct() {
parent::__construct();
}



function index(){
    $data='';
    $this->load->module('templates');
    $this->templates->dashboard($data);
}
}