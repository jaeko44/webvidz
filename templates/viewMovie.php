<?php include "templates/include/header.php" ?>

<div class="col-md-12">
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-primary"><?php echo $results['movie']->genre?></strong>
        <h3 class="mb-0"><?php echo $results['movie']->title?></h3>
        <div class="mb-1 text-muted"><?php echo $results['movie']->releaseyear?></div>
        <p class="card-text mb-auto">Synopsis: <?php echo $results['movie']->synopsis?></p>
        <p class="card-text mb-auto">Director: <?php echo $results['movie']->director?></p>
        <p class="card-text mb-auto">Rating: <?php echo $results['movie']->rating?>/5</p>
        <a href="admin.php?action=editMovie&amp;movieId=<?php echo $results['movie']->id?>" class="stretched-link">Edit Movie</a>
        
      </div>

      <div class="col-auto d-none d-lg-block">
        <img src="<?php echo $results['movie']->poster?>" alt="<?php echo $results['movie']->title?>" width="200">
      </div>
    </div>

    <iframe width="800" height="450"
src="<?php echo $results['movie']->trailer?>">
</iframe>

  </div>

  <a href="#">Click here to Purchase</a>


      <p><a href="./">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
