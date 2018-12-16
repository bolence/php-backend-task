<?php 

namespace Contracts;


interface DBInterface {

	public function connect( );

	public function select( string $table );

	public function insert( string $table, array $data );

	public function delete( string $table, int $id );

	public function update( string $table, int $id  );

	public function row( string $table, int $id );


}