<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account extends CI_Controller
{
    function __construct() {
        parent::__construct();
    }

//    public function index()
//    {
//    }

    public function login()
    {
        $this->load->library('parser');

        $data = array(
            'TITLE' => 'Login'
        );

        $this->parser->parse('templates/headTemplate', $data);
        $this->load->view('login');
        $this->load->view('templates/footTemplate');
    }

    public function signup()
    {
        $this->load->library('parser');

        $data = array(
            'TITLE' => 'Sign Up'
        );

        $this->parser->parse('templates/headTemplate', $data);
        $this->load->view('signup');
        $this->load->view('templates/footTemplate');
    }
}
