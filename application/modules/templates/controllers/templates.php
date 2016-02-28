<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Templates extends MX_Controller
{

function __construct() {
parent::__construct();
}


function public_one_col($data){
    $this->load->view('public_one_col', $data);
    
}
function admin($data){
    $this->load->view('admin', $data);
}

function dashboard($data){
    $this->load->view('dashboard', $data);
}






function get($order_by) {
$this->load->model('mdl_templates');
$query = $this->mdl_templates->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_templates');
$query = $this->mdl_templates->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('mdl_templates');
$query = $this->mdl_templates->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_templates');
$query = $this->mdl_templates->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('mdl_templates');
$this->mdl_templates->_insert($data);
}

function _update($id, $data) {
$this->load->model('mdl_templates');
$this->mdl_templates->_update($id, $data);
}

function _delete($id) {
$this->load->model('mdl_templates');
$this->mdl_templates->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_templates');
$count = $this->mdl_templates->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_templates');
$max_id = $this->mdl_templates->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_templates');
$query = $this->mdl_templates->_custom_query($mysql_query);
return $query;
}

}