<?php include "templates/include/header.php" ?>

      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['movie']->title )?></h1>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['movie']->synopsis )?></div>
      <div style="width: 75%;"><?php echo $results['movie']->author?></div>
      <p class="pubDate">Published on <?php echo date('j F Y', $results['movie']->publicationDate)?></p>

      <p><a href="./">Return to Homepage</a></p>

<?php include "templates/include/footer.php" ?>
