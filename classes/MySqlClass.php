<?php

namespace Classes;

use Contracts\DBInterface;
use PDO;


class MysqlClass implements DBInterface  {


	protected $db;
	protected $fetch_mode = PDO::FETCH_OBJ;
	protected $error_mode = PDO::ERRMODE_EXCEPTION;

	/**
	 * Class constructor
	 */
	public function __construct()
	{
		$this->connect();
	}

	/**
	 * Prepare pdo connection
	 * @return Object   PDO instance
	 */
	public function connect()
	{

		try {

			$this->db = new PDO(''.getenv('DB_CONNECTION').':host='.getenv('DB_HOST').';dbname='.getenv('DB_DATABASE').'', getenv('DB_USERNAME'), getenv('DB_PASSWORD'));	
			$this->db->setAttribute(PDO::ATTR_ERRMODE, $this->error_mode);
			$this->db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, $this->fetch_mode); 


		} catch(PDOException $e){

		     throw new PDOException($e); 

		} catch(Exception $e){

		   throw new Exception( $e->getMessage( ) , (int)$e->getCode( ) );

		}
		
	}


	/**
	 * Select all from table
	 * @param  String        $query
	 * @return        
	 */
	public function select( string $table )
	{
		$query = "SELECT * FROM {$table}";

		return $this->db->query( $query )->fetchAll();
	}

	/**
	 * List one row by id from session
	 * @param  String        $table
	 * @param  Integer       $id
	 * @return Object
	 */
	public function row( string $table, int $id )
	{

		$query = "SELECT * FROM {$table} WHERE id = :id";
		$query = $this->db->prepare( $query );
		$query->bindParam('id', $id);
		$query->execute();

		$result = $query->fetch();

		return $result;

	}

	/**
	 * Insert into table
	 * @param  String $table 
	 * @param  Array  $data
	 * @return Boolean
	 */
    public function insert(string $table, array $data)
    {

    if( empty($data) ) {
        throw new InvalidArgumentException('Cannot insert an empty array.');
    }
    if( !is_string($table) ) {
        throw new InvalidArgumentException('Table name must be a string.');
    }

    $fields = '`' . implode('`, `', array_keys($data)) . '`';
    $placeholders = ':' . implode(', :', array_keys($data));

    $sql = "INSERT INTO {$table} ($fields) VALUES ({$placeholders})";


    $query = $this->db->prepare($sql);


    foreach($data as $placeholder => &$value) {

        $placeholder = ':' . $placeholder;

        $query->bindParam($placeholder, $value);

    }

    if(!$query->execute()) {
        throw new ErrorException('Could not execute query');
    }

    if($query->rowCount() == 0) {

        throw new ErrorException('Could not insert data into {$table} table.');
    }

    return true;

}

	/**
	 * Update resource
	 * @param  string $table 
	 * @param  int    $id    
	 * @return [type]       
	 */
	public function update( string $table, int $id )
	{
		
		return null;	

	}
	/**
	 * Delete resource
	 * @param  string $table 
	 * @param  int    $id    
	 * @return Boolean        
	 */
	public function delete( string $table, int $id )
	{

		try {

		$query = "DELETE FROM {$table} WHERE id = :id ";
		$query = $this->db->prepare( $query );
		$query->bindParam('id', $id);
		$query->execute();

		}catch( Exception $e) {
			throw new Exception("Error Processing Delete Query");
			
		}
		
		return true;

	}









}