<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {

	function find_user($email)
	{
		$query = 'SELECT * FROM users WHERE email like ?';
		$values = $email;
		return $this->db->query($query,$values)->row();
	}

	function add_user($form,$password)
	{
		$query= 'INSERT INTO users (first_name,last_name,email,password,created_at,updated_at) VALUES (?,?,?,?,NOW(),NOW())';
		$values= array($form['first_name'],$form['last_name'],$form['email'],$password);
		return $this->db->query($query,$values);
	}
    function get_user_by_id($id) {
        return $this->db->query("SELECT * FROM users WHERE id = ?", array($id))->row_array();
    }
    function get_user_info($id) {
        $query = "SELECT reviews.user_id, reviews.movie_id, movies.movie
                 FROM reviews
                 LEFT JOIN movies on reviews.movie_id = movies.id
                 WHERE user_id =".$id;
        return $this->db->query($query)->result_array();
    }
    function get_reviews()
    {
        $query = "SELECT * FROM reviews";
        return $this->db->query($query)->result_array();
    }
    function get_recent_reviews() {
        $query = "SELECT reviews.created_at, reviews.stars, movies.movie, movies.director
                  from reviews
                  left join movies on reviews.movie_id = movies.id
                  order by reviews.created_at DESC
                  limit 3";
        return $this->db->query($query)->result_array();
    }
    function get_average_rating($id) {
        $query = "SELECT AVG(reviews.stars) as 'avgStars'
                 FROM reviews
                 WHERE reviews.movie_id =".$id;
        return $this->db->query($query)->result_array();
    }
    function create_movie($form) {
        $query= 'INSERT INTO movies (movie, director, created_at, updated_at) VALUES (?,?,NOW(),NOW())';
        $values= array($form['title'],$form['director']);
        return $this->db->query($query,$values);
    }
    function get_movies()
    {
        $query="SELECT * FROM movies";
        return $this->db->query($query)->result_array();
    }
    function get_movie_by_title($data) {
        return $this->db->query("SELECT * FROM movies WHERE movie = ?", array($data))->row_array();
    }
    function get_single_movie($id)
    {
        return $this->db->query("SELECT * FROM movies WHERE id = ?", array($id))->row_array();
    }

    function get_reviews_users()
    {
        $query= "SELECT reviews.id as reviews_id, reviews.review, reviews.user_id, reviews.created_at, reviews.stars, movies.id as movie_id, movies.movie, movies.director, users.first_name, users.last_name
                    FROM movies,reviews,users
                    WHERE movies.id = reviews.movie_id
                    AND reviews.user_id = users.id
                    GROUP BY reviews.id";
        return $this->db->query($query)->result_array();
    }
    function add_review($data,$movie_id)
    {
        $query = "INSERT INTO reviews (review, stars, user_id, movie_id, created_at, updated_at) VALUES (?,?,?,?,NOW(),NOW())";
        $values = array($data['form']['review'], $data['form']['stars'], $data['user']['user_id'], $movie_id);

        return $this->db->query($query, $values);
    }
}
