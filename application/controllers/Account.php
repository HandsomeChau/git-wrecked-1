<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class Account extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function login()
    {
        $this->load->library( 'parser' );

        $data = array(
            'TITLE' => 'Login'
        );

        $this->parser->parse( 'templates/headTemplate', $data );
        $this->load->view( 'login' );
        $this->load->view( 'templates/footTemplate' );
    }

    public function authenticate()
    {
        echo( "HERE" );

        print_r( $_REQUEST );
        $username = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        $this->load->model( 'Users' );
        $auth = $this->Users->authenticate( $username, $password );

        if ( $auth ) {
            echo( "Yeah right password" );
        } else {
            echo( "BOO WRONG PASSWORD!" );
        }

    }

    public function register()
    {
        $this->load->library( array( 'parser', 'form_validation' ) );
        $this->load->library( 'form_validation' );
        $this->load->helper( array( 'form', 'url' ) );

        $data = array(
            'TITLE' => 'Sign Up'
        );

        $this->parser->parse( 'templates/headTemplate', $data );

        /**
         * Set the rules for form submission
         */
        $this->form_validation->set_rules( 'inputEmail', 'Email', 'trim|required|valid_email' );
        $this->form_validation->set_rules( 'inputPassword', 'Password', 'trim|required|min_length[8]',
            array( 'required' => 'You must provide a %s.' )
        );
        $this->form_validation->set_rules( 'inputPassword_repeat', 'Password Confirmation',
            'trim|required|min_length[8]|matches[inputPassword]',
            array( 'required' => 'You must provide a %s.',
                   'matches'  => '%s mush match with Password.' ) );

        if ( $this->form_validation->run() == FALSE ) {
            /**
             * Reload the form if failed to meet the rules
             */
            $this->load->view( 'signup' );
        } else {
            /**
             * Take the user to the success view and insert the registration information to the database
             */
            $this->load->view( 'form_success' );
            $username = $_REQUEST['inputEmail'];
            $password = $_REQUEST['inputPassword'];
            $halfHash = crypt( $password, md5( $password . "xio" ) );
            $fullHashed = md5( $halfHash . "$halfHash;'/1rnr$password" );

            $sql = "INSERT INTO users (username, hashedPassword)
                  VALUES ( '$username' , '$fullHashed' )";
            $this->db->query( $sql );
        }

        $this->load->view( 'templates/footTemplate' );
    }
}
