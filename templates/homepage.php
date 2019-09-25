<?php include "templates/include/header.php" ?>

      <ul id="headlines">
<div class="row mb-2">


<?php foreach ( $results['movies'] as $movie ) { ?>

  <div class="col-md-6">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary"><?php echo $movie->genre?></strong>
        <h3 class="mb-0"><?php echo $movie->title?></h3>
        <div class="mb-1 text-muted"><?php echo $movie->releaseyear?></div>
        <p class="card-text mb-auto"><?php echo $movie->synopsis?></p>
        <a href=".?action=viewMovie&amp;movieId=<?php echo $movie->id?>" class="stretched-link">View Movie</a>
      </div>
      <div class="col-auto d-none d-lg-block">
        <img src="<?php echo $movie->poster?>" alt="<?php echo $movie->title?>" width="200" height="250">
      </div>
    </div>
  </div>

<?php } ?>

<h1>
<?php 

if (empty($results['movies'])){
  echo 'Unforunately no movies were found';
}

?>
</h1>
</div>




      </ul>

<?php include "templates/include/footer.php" ?>