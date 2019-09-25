<?php

/**
 * Class to handle movies
 */

class Movie
{

  // Properties

  /**
  * @var int The movie ID from the database
  */
  public $id = null;

  /**
  * @var string Full title of the movie
  */
  public $title = null;

  /**
  * @var string A short summary of the movie
  */
  public $synopsis = null;

  /**
  * @var string The HTML content of the movie
  */
  public $poster = null;

  /**
  * @var string The HTML content of the movie
  */
  public $trailer = null;

    /**
  * @var string The HTML content of the movie
  */
  public $director = null;

  /**
  * @var string The HTML content of the movie
  */
  public $genre = null;

  /**
  * @var string The HTML content of the movie
  */
  public $rating = null;

  /**
  * @var string The HTML content of the movie
  */
  public $releaseyear = null;

  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */

  public function __construct( $data=array() ) {
    if (isset( $data['id'])) $this->id = (int) $data['id'];
    if ( isset( $data['title'] ) ) $this->title = $data['title'];
    if ( isset( $data['synopsis'] ) ) $this->synopsis = $data['synopsis'];
    if ( isset( $data['poster'] ) ) $this->poster = $data['poster'];
    if ( isset( $data['trailer'] ) ) $this->trailer = $data['trailer'];
    if ( isset( $data['director'] ) ) $this->director = $data['director'];
    if ( isset( $data['genre'] ) ) $this->genre = $data['genre'];
    if ( isset( $data['rating'] ) ) $this->rating = (int) $data['rating'];
    if ( isset( $data['releaseyear'] ) ) $this->releaseyear = (int) $data['releaseyear'];

  }


  /**
  * Sets the object's properties using the edit form post values in the supplied array
  *
  * @param assoc The form post values
  */

  public function storeFormValues ( $params ) {

    // Store all the parameters
    $this->__construct( $params );

  }


  /**
  * Returns an movie object matching the given movie ID
  *
  * @param int The movie ID
  * @return movie|false The movie object, or false if the record was not found or there was a problem
  */

  public static function getById( $id ) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM movies WHERE id = :id";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    $st->execute();
    $row = $st->fetch();
    $conn = null;
    if ( $row ) return new movie( $row );
  }


  /**
  * Returns all (or a range of) movie objects in the DB
  *
  * @param int Optional The number of rows to return (default=all)
  * @return Array|false A two-element array : results => array, a list of movie objects; totalRows => Total number of movies
  */

  public static function getList() {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM movies
            ORDER BY id DESC";

    $st = $conn->prepare( $sql );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $movie = new movie( $row );
      $list[] = $movie;
    }

    // Now get the total number of movies that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  public static function getListByGenre($genre) {
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "SELECT * FROM `movies` WHERE `genre` = :genre";
    $st = $conn->prepare( $sql );
    $st->bindValue( ":genre", $genre, PDO::PARAM_STR );
    $st->execute();
    $list = array();

    while ( $row = $st->fetch() ) {
      $movie = new movie( $row );
      $list[] = $movie;
    }

    // Now get the total number of movies that matched the criteria
    $sql = "SELECT FOUND_ROWS() AS totalRows";
    $totalRows = $conn->query( $sql )->fetch();
    $conn = null;
    return ( array ( "results" => $list, "totalRows" => $totalRows[0] ) );
  }


  /**
  * Inserts the current movie object into the database, and sets its ID property.
  */

  public function insert() {

    // Does the movie object already have an ID?
    if ( !is_null( $this->id ) ) trigger_error ( "movie::insert(): Attempt to insert an movie object that already has its ID property set (to $this->id).", E_USER_ERROR );

    // Insert the movie
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "INSERT INTO movies ( title, releaseyear, synopsis, poster, trailer, director, genre, rating ) VALUES ( :title, :releaseyear, :synopsis, :poster, :trailer, :director, :genre, :rating )";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":releaseyear", $this->releaseyear, PDO::PARAM_STR );
    $st->bindValue( ":synopsis", $this->synopsis, PDO::PARAM_STR );
    $st->bindValue( ":poster", $this->poster, PDO::PARAM_STR );
    $st->bindValue( ":trailer", $this->trailer, PDO::PARAM_STR );
    $st->bindValue( ":director", $this->director, PDO::PARAM_STR );
    $st->bindValue( ":genre", $this->genre, PDO::PARAM_STR );
    $st->bindValue( ":rating", $this->rating, PDO::PARAM_STR );

    $st->execute();
    $this->id = $conn->lastInsertId();
    $conn = null;
  }


  /**
  * Updates the current movie object in the database.
  */

  public function update() {

    // Does the movie object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "movie::update(): Attempt to update an movie object that does not have its ID property set.", E_USER_ERROR );
   
    // Update the movie
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $sql = "UPDATE movies SET title=:title, releaseyear=:releaseyear, synopsis=:synopsis, poster=:poster, trailer=:trailer, director=:director, genre=:genre, rating=:rating WHERE id = :id";
    $st = $conn->prepare ( $sql );
    $st->bindValue( ":title", $this->title, PDO::PARAM_STR );
    $st->bindValue( ":releaseyear", $this->releaseyear, PDO::PARAM_STR );
    $st->bindValue( ":synopsis", $this->synopsis, PDO::PARAM_STR );
    $st->bindValue( ":poster", $this->poster, PDO::PARAM_STR );
    $st->bindValue( ":trailer", $this->trailer, PDO::PARAM_STR );
    $st->bindValue( ":director", $this->director, PDO::PARAM_STR );
    $st->bindValue( ":genre", $this->genre, PDO::PARAM_STR );
    $st->bindValue( ":rating", $this->rating, PDO::PARAM_STR );

    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }


  /**
  * Deletes the current movie object from the database.
  */

  public function delete() {

    // Does the movie object have an ID?
    if ( is_null( $this->id ) ) trigger_error ( "movie::delete(): Attempt to delete an movie object that does not have its ID property set.", E_USER_ERROR );

    // Delete the movie
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
    $st = $conn->prepare ( "DELETE FROM movies WHERE id = :id LIMIT 1" );
    $st->bindValue( ":id", $this->id, PDO::PARAM_INT );
    $st->execute();
    $conn = null;
  }

}

?>