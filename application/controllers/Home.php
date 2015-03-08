<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class home extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * This takes to the home page where user can login or register for the site, it will have basic information
     * about the site. This is also the default route
     */
    public function index()
    {
        $this->load->library( 'parser' );

        $data = array(
            'TITLE' => 'Homepage'
        );

        $this->parser->parse( 'templates/headTemplate', $data );
        $this->load->view( 'home' );
        $this->load->view( 'templates/footTemplate' );
    }
}