<?php

require( "config.php" );
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

switch ( $action ) {
  case 'viewMovie':
  viewMovie();
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
  $results['pageTitle'] = $results['movie']->title . " | Widget News";
  require( TEMPLATE_PATH . "/viewMovie.php" );
}

function homepage() {
  $results = array();
  $data = Movie::getList();
  $results['movies'] = $data['results'];
  $results['totalRows'] = $data['totalRows'];
  $results['pageTitle'] = "Widget News";
  require( TEMPLATE_PATH . "/homepage.php" );
}

?>