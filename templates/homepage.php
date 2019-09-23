<?php include "templates/include/header.php" ?>

      <ul id="headlines">

<?php foreach ( $results['movies'] as $movie ) { ?>

        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F', $movie->publicationDate)?></span><a href=".?action=viewMovie&amp;movieId=<?php echo $movie->id?>"><?php echo htmlspecialchars( $movie->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $movie->synopsis )?></p>
        </li>

<?php } ?>

      </ul>

<?php include "templates/include/footer.php" ?>