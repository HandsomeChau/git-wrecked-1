<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );

class user extends CI_Controller
{
    /**
     * This will take the user to their account overview page and show them there GPA and allow for them to logout
     * or enter into an edit mode and change their grades. This will also show a basic breakdown of their grade so
     * far. This page will require the user to have logged in to use it.
     */
    public function index()
    {
        $this->load->library( 'parser' );

        $data = array(
            'TITLE' => 'Account'
        );

        $this->parser->parse( 'templates/headTemplate', $data );
        $this->load->view( 'account' );
        $this->load->view( 'templates/footTemplate' );
    }

    /**
     * This will be acceptable form the account page and will allow the user to Create Update and Delete their grades.
     * Ths page will require you to be signed in to use it.
     */
    public function edit_grades()
    {
        $this->load->library( 'parser' );

        $data = array(
            'TITLE' => 'edit_grades'
        );

        $this->parser->parse( 'templates/headTemplate', $data );
        $this->load->view( 'edit_grades' );
        $this->load->view( 'templates/footTemplate' );
    }
}