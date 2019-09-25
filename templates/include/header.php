<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo htmlspecialchars( $results['pageTitle'] )?></title>
    <link rel="stylesheet" type="text/css" href="styles/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="styles/index.css" />

  </head>
  <body>
  <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-12 text-center">
        <a class="blog-header-logo text-dark" href="index.php">WebVidz</a>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 text-muted" href="index.php">Home</a>
      <a class="p-2 text-muted" href=".?action=viewGenre&amp;genre=action">Action</a>
      <a class="p-2 text-muted" href=".?action=viewGenre&amp;genre=comedy">Comedy</a>
      <a class="p-2 text-muted" href=".?action=viewGenre&amp;genre=drama">Drama</a>
      <a class="p-2 text-muted" href=".?action=viewGenre&amp;genre=documentary">Documentary</a>
    </nav>
  </div>
