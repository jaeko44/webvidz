<?php

require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'viewMovie':
  viewMovie();
    break;
  case 'viewGenre':
  viewGenre();
    break;
  default:
    homepage();
}

function viewMovie() {
  if ( !isset($_GET["movieId"]) || !$_GET["movieId"] ) {
    homepage();
    return;
  }

  $results = array();
  $results['movie'] = Movie::getById( (int)$_GET["movieId"] );
  $results['pageTitle'] = $results['movie']->title . " | WebVidz";
  require( TEMPLATE_PATH . "/viewMovie.php" );
}

function viewGenre() {
  if ( !isset($_GET["genre"]) || !$_GET["genre"] ) {
    homepage();
    return;
  }

  $results = array();
  $data = Movie::getListByGenre($_GET["genre"]);
  $results['movies'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = $_GET["genre"] . " Movies";
  require( TEMPLATE_PATH . "/homepage.php" );
}

function homepage() {
  $results = array();
  $data = Movie::getList();
  $results['movies'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "WebVidz Homepage";
  require( TEMPLATE_PATH . "/homepage.php" );
}

?>