<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->Model('Model');
	}
	public function settings() {
		$data = array(
			"user" => $this->session->userdata('user')
		);
		$this->load->view('settings', $data);
	}
	public function index()
	{
		$data = array (
			"reviews" => $this->Model->get_recent_reviews()
		);
		$this->load->view('index',$data);
	}
	public function wall()
	{
		$data = array(
			'user' => $this->session->userdata('user'),
			'movies' => $this->Model->get_movies(),
			'reviews'=> $this->Model->get_reviews_users()
		);
		$this->load->view('wall',$data);
	}
	public function add()
	{
		$data = array(
			'user' => $this->session->userdata('user'),
			'movies' => $this->Model->get_reviews_users()
		);
		$this->load->view('add',$data);
	}
	public function add_movie() {
		$form = $this->input->post(null,true);
		$this->Model->create_movie($form);
		$data = array(
			"user" => $this->session->userdata('user')
		);
		$this->load->view('add_movie', $data);
	}
	public function show_single($id)
	{
		$movie = $this->Model->get_single_movie($id);
		$data = array(
			'id' => $id,
			'user' => $this->session->userdata('user'),
			'movie' => $movie,
			'reviews' => $this->Model->get_reviews_users(),
			'avgStars' => $this->Model->get_average_rating($movie['id']),
			'all_reviews' => $this->Model->get_reviews()
		);
		$this->load->view('show_single',$data);
	}
	public function show_user($id) {
		$data = array(
			'users' => $this->session->userdata('user'),
			'user' => $this->Model->get_user_by_id($id),
			'user_info' => $this->Model->get_user_info($id),
		);
		$this->load->view('show_user',$data);
	}
	public function add_review()
	{
		$user = $this->session->userdata('user');
		$form = $this->input->post(null,true);
		$movies = $this->Model->get_movies();

		foreach ($movies as $movie) {
			if($form['title'] == $movie['movie'])
			{
				$movie_id = $movie['id'];
			}
		}
		$data = array(
			"id" => $user['user_id'],
			"user" => $user,
			"form" => $this->input->post(null,true),
			'movie' => $this->Model->get_single_movie($movie_id),
			'reviews' => $this->Model->get_reviews_users()
		);
		$this->Model->add_review($data,$movie_id);
		redirect('/main/show_single/'.$movie_id);
	}
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->Model->find_user($email);
		if($user)
		{
		  $enc_password = crypt($password,$user->password); //If you 'crypt' a non-encrypted password with an encrypted password, the successful result will be the encrypted password
            if($enc_password == $user->password) //do the encrypted passwords match? if yes, then log in
            {
                $user = array(
                   'user_id' => $user->id,
                   'user_email' => $user->email,
                   'user_name' => $user->first_name.' '.$user->last_name,
                   'first_name' => $user->first_name,
                   'last_name' => $user->last_name,
                   'is_logged_in' => true
                );
                $this->session->set_userdata('user', $user);
                redirect('/main/wall');
            }
            else
            {
                $this->session->set_flashdata("login_error", "Invalid email or password!");
                redirect('/');
            }
        }
        else
        {
            $this->session->set_flashdata("login_error", "Invalid email or password!");
            redirect('/');
        }
    }

    public function register()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('first_name', 'First Name', 'required|min_length[2]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required|min_length[2]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[1]');
        $this->form_validation->set_rules('confirm', 'Confirm Password', 'required|');

        $this->form_validation->set_message('is_unique', '%s is already taken');  //custom error messages
        $this->form_validation->set_message('required', '%s is required');  //custom error messages

        if($this->form_validation->run() === FALSE) //displays error message if form validation rules were violated
        {
            $this->view_data["errors"] = validation_errors();
            $error_log = validation_errors();
            $this->session->set_flashdata("registration_error", $error_log);
            redirect(base_url());
        }
        else
        {
            $form=$this->input->post(null,true); //pull in post data
            $salt = bin2hex(openssl_random_pseudo_bytes(22));
            $password = crypt($form['password'],$salt);

            $this->Model->add_user($form,$password);
            redirect('/');
        }
    }

    public function logout()
    {
    	$this->session->sess_destroy();
    	redirect('/');

    }

}

//end of main controller