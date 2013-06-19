<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User extends KT_Controller {
    function __construct()
	{
		parent::__construct();
    }

    function index() {
        $this->dashboard();
    }

    function dashboard() {
        //TODO: Get user data.

        //TODO: Display dashboard.
    }

    //Show user profile
    function profile() {

    }
}

/* End of file kapstop/auth.php */
/* Location: ./application/controllers/kapstop/auth.php */