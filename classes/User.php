<?php

namespace Classes;


use Contracts\DBInterface as DBConnection;
use Classes\Session;
use Classes\Redirect;

class User {

	private $db = null;

	private $sessionName = null;

	private $isLoggedIn = false;

	private $table = 'users';

	public function __construct( DBConnection $db ) 
	{
		$this->db = $db;

	}


	/**
	 * Login user
	 * @param  String $email    
	 * @param  String $password 
	 * @return Object
	 */
	public function loginUser( $email, $password )
	{

		$password = hashing( $password );

		$user = $this->getCurrentUser( $email, $password );

		if( $user ) {

			$this->sessionName = 'logged_in';
			Session::session_put($this->sessionName, $user->id);
			$this->isLoggedIn = true;

		} else {

			return false;

		}

		return Redirect::to('index.php');
		
	}

	/**
	 * Insert new user
	 * @param  Array  $data 
	 * @return Boolean
	 */
	public function registerUser( array $data )
	{
		
		return $this->db->insert( $this->table, $data );

	}

	/**
	 * Get all users from table
	 * @return Object
	 */
	public function getAllUsers()
	{
		$users = $this->db->select( $this->table );

		return $users;
	}

	/**
	 * Get current user from table
	 * @param  Integer    $id 
	 * @return Object
	 */
	public function getCurrentUser( $email, $password )
	{
		$user = $this->db->row( $this->table, $email, $password );
		return $user;
	}

	/**
	 * [logoutUser description]
	 * @return [type] [description]
	 */
	public function logoutUser( )
	{	

		Session::session_delete($this->sessionName);
		$this->sessionName = null;
		$this->isLoggedIn = false;

	}


	public function loggedUser()
	{
		return Session::session_get($this->sessionName);
	}


}