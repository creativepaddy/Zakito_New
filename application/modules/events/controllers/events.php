<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Events extends MX_Controller
{

function __construct() {
parent::__construct();
}

function get_data_from_post(){   
    $data['event_name']=  $this->input->post('event_name',TRUE);
    $data['venue_details'] = $this->input->post('venue_details',TRUE);
    //$data['options'] = "";
   // $data['theme_name'] = $this->input->post('theme_name',TRUE);
    $data['web_address'] = $this->input->post('web_address',TRUE);
    $data['event_details'] = $this->input->post('event_details',TRUE);
    $data['highlights'] = $this->input->post('highlights',TRUE);
    $data['artist_details'] = $this->input->post('artist_details',TRUE);
    $data['event_contact'] = $this->input->post('event_contact',TRUE);
    $data['alt_contact'] = $this->input->post('alt_contact',TRUE);
    
    return $data;
}

function get_data_from_db($update_id){
        $query = $this->get_where($update_id);
        foreach ($query->result() as $row){
        $data['event_name']= $row->event_name;
        $data['venue_details']=  $row->venue_details;
        $data['options']=  $row->event_city;
        //$data['theme_name']=  $row->theme_name;
        $data['web_address']=  $row->web_address;
        $data['event_details']=  $row->event_details;
        $data['highlights']=  $row->highlights;
        $data['artist_details']=  $row->artist_details;
        $data['event_contact']=  $row->event_contact;
        $data['alt_contact']=  $row->alt_contact;
 
     }
    if(!isset($data)){
        $data="";
    }
    
    return $data;
}

function eventsdetails(){ 
   $update_id = $this->uri->segment(3);
   $submit = $this->input->post('submit', TRUE);
   if($submit == 'Submit'){
           //person has submitted the form
        $data = $this->get_data_from_post();
    }  else {
        if(is_numeric($update_id)){
            $data=  $this->get_data_from_db($update_id);
        }
    }
    if(!isset($data)){
        $data=$this->get_data_from_post();
    }
    
    $data['update_id']=$update_id;
    
    $this->load->view('eventdata', $data);
}


function submit(){
    $this->load->library('form_validation');

    $this->form_validation->set_rules('event_name', 'Event Name', 'required|xss_clean');
    $this->form_validation->set_rules('venue_details', 'Venue Details', 'required|xss_clean');
    //$this->form_validation->set_rules('cities', 'Select city', 'required|xss_clean');
    //$this->form_validation->set_rules('theme_name', 'Theme Name', 'required|xss_clean');
    $this->form_validation->set_rules('web_address', 'Web Address', 'required|xss_clean');
    $this->form_validation->set_rules('event_details', 'Event Details', 'required|xss_clean');
    //$this->form_validation->set_rules('highlights', 'Highlights', 'required|xss_clean');
    $this->form_validation->set_rules('artist_details', 'Artist Details', 'required|xss_clean');
    $this->form_validation->set_rules('event_contact', 'Contact Number', 'required|xss_clean');
    $this->form_validation->set_rules('alt_contact', 'Alternative Contact Number', 'required|xss_clean');

    if ($this->form_validation->run($this) == FALSE)
        {
             $this->eventsdetails();
        }
                else
                {
            $data = $this->get_data_from_post();
            //figure out what the page_url shoud be
            //$data['page_url'] = url_title($data['event_details']);
                    
            $update_id=  $this->uri->segment(3);
           if(is_numeric($update_id)){
           $this->_update($update_id, $data);
       }else
       {
            $this->_insert($data);
        }
        redirect('templates/dashboard');
    }
 }



        function get($order_by) {
$this->load->model('mdl_events');
$query = $this->mdl_events->get($order_by);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$this->load->model('mdl_events');
$query = $this->mdl_events->get_with_limit($limit, $offset, $order_by);
return $query;
}

function get_where($id) {
$this->load->model('mdl_events');
$query = $this->mdl_events->get_where($id);
return $query;
}

function get_where_custom($col, $value) {
$this->load->model('mdl_events');
$query = $this->mdl_events->get_where_custom($col, $value);
return $query;
}

function _insert($data) {
$this->load->model('mdl_events');
$this->mdl_events->_insert($data);
}

function _update($id, $data) {
$this->load->model('mdl_events');
$this->mdl_events->_update($id, $data);
}

function _delete($id) {
$this->load->model('mdl_events');
$this->mdl_events->_delete($id);
}

function count_where($column, $value) {
$this->load->model('mdl_events');
$count = $this->mdl_events->count_where($column, $value);
return $count;
}

function get_max() {
$this->load->model('mdl_events');
$max_id = $this->mdl_events->get_max();
return $max_id;
}

function _custom_query($mysql_query) {
$this->load->model('mdl_events');
$query = $this->mdl_events->_custom_query($mysql_query);
return $query;
}

}