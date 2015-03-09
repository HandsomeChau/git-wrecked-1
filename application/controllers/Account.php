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

    public function signUp()
    {
        $this->load->library( array( 'parser', 'form_validation' ) );
        $this->load->library( 'form_validation' );
        $this->load->helper( array( 'form', 'url' ) );

        $data = array(
            'TITLE' => 'Sign Up'
        );

        $this->parser->parse( 'templates/headTemplate', $data );
        $this->load->view( 'signup' );
        $this->load->view( 'templates/footTemplate' );

        $this->form_validation->set_rules( 'inputEmail', 'Email', 'trim|required|valid_email' );
        $this->form_validation->set_rules( 'inputPassword', 'Password', 'trim|required',
            array( 'required' => 'You must provide a %s.' )
        );
        $this->form_validation->set_rules( 'inputPassword_repeat', 'Password Confirmation',
            'trim|required|matches[inputPassword]' );

        if ( $this->form_validation->run() == FALSE ) {
            echo "Wrong";

        } else {
            echo "Right";
            $this->parser->parse( 'templates/headTemplate', $data );
            $this->load->view( 'user' );
            $this->load->view( 'templates/footTemplate' );
        }
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
    }
}
