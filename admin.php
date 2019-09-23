<?php

require( "config.php" );
session_start();
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";
$username = isset( $_SESSION['username'] ) ? $_SESSION['username'] : "";

switch ( $action ) {
  case 'newMovie':
    newMovie();
    break;
  case 'editMovie':
    editMovie();
    break;
  case 'deleteMovie':
    deleteMovie();
    break;
  default:
    listMovies();
}


function newMovie() {

  $results = array();
  $results['pageTitle'] = "New Movie";
  $results['formAction'] = "newMovie";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the movie edit form: save the new movie
    $movie = new Movie;
    $movie->storeFormValues( $_POST );
    $movie->insert();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the movie list
    header( "Location: admin.php" );
  } else {

    // User has not posted the movie edit form yet: display the form
    $results['movie'] = new Movie;
    require( TEMPLATE_PATH . "/admin/editMovie.php" );
  }

}


function editMovie() {

  $results = array();
  $results['pageTitle'] = "Edit Movie";
  $results['formAction'] = "editMovie";

  if ( isset( $_POST['saveChanges'] ) ) {

    // User has posted the movie edit form: save the movie changes

    if ( !$movie = Movie::getById( (int)$_POST['movieId'] ) ) {
      header( "Location: admin.php?error=movieNotFound" );
      return;
    }

    $movie->storeFormValues( $_POST );
    $movie->update();
    header( "Location: admin.php?status=changesSaved" );

  } elseif ( isset( $_POST['cancel'] ) ) {

    // User has cancelled their edits: return to the movie list
    header( "Location: admin.php" );
  } else {

    // User has not posted the movie edit form yet: display the form
    $results['movie'] = Movie::getById( (int)$_GET['movieId'] );
    require( TEMPLATE_PATH . "/admin/editMovie.php" );
  }

}


function deleteMovie() {

  if ( !$movie = Movie::getById( (int)$_GET['movieId'] ) ) {
    header( "Location: admin.php?error=movieNotFound" );
    return;
  }

  $movie->delete();
  header( "Location: admin.php?status=movieDeleted" );
}


function listMovies() {
  $results = array();
  $data = Movie::getList();
  $results['movies'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "All Movies";

  if ( isset( $_GET['error'] ) ) {
    if ( $_GET['error'] == "movieNotFound" ) $results['errorMessage'] = "Error: Movie not found.";
  }

  if ( isset( $_GET['status'] ) ) {
    if ( $_GET['status'] == "changesSaved" ) $results['statusMessage'] = "Your changes have been saved.";
    if ( $_GET['status'] == "movieDeleted" ) $results['statusMessage'] = "Movie deleted.";
  }

  require( TEMPLATE_PATH . "/admin/listMovies.php" );
}

?>