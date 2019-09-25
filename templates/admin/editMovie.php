<?php include "templates/include/header.php" ?>

      <div id="adminHeader">
        <h2>WebVidz Admin</h2>
      </div>

      <h1><?php echo $results['pageTitle']?></h1>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="movieId" value="<?php echo $results['movie']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label for="title">Movie Title</label>
            <input type="text" name="title" id="title" placeholder="Name of the movie" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['movie']->title )?>" />
          </li>

          <li>
            <label for="synopsis">Movie Summary</label>
            <textarea name="synopsis" id="synopsis" placeholder="Brief description of the movie" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars( $results['movie']->synopsis )?></textarea>
          </li>

          <li>
            <label for="poster">Movie Poster (URL to Image)</label>
            <input type="text" name="poster" id="poster" placeholder="Poster of the movie" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['movie']->poster )?>" />
          </li>

          <li>
            <label for="trailer">Movie Trailer (Embed Video Link)</label>
            <input type="text" name="trailer" id="trailer" placeholder="Trailer of the movie" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['movie']->trailer )?>" />
          </li>

          <li>
            <label for="director">Movie Director</label>
            <input type="text" name="director" id="director" placeholder="Director of the movie" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['movie']->director )?>" />
          </li>

          <li>
            <label for="genre">Movie Genre</label>
            <select name="genre" id="genre">
              <option value="action">Action</option>
              <option value="comedy">Comedy</option>
              <option value="drama">Drama</option>
              <option value="documentary">Documentary</option>
            </select>
          </li>

          <li>
            <label for="rating">Movie Rating</label>
            <input type="number" min="1" max="5" name="rating" id="rating" placeholder="Rating of the movie" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['movie']->rating )?>" />
          </li>

          <li>
            <label for="releaseyear">Release Year</label>
            <input type="number" min="1950" max="2020" name="releaseyear" id="releaseyear" placeholder="YYYY" required maxlength="10" value="<?php echo $results['movie']->releaseyear ?>" />
          </li>


        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>

<?php if ( $results['movie']->id ) { ?>
      <p><a href="admin.php?action=deleteMovie&amp;movieId=<?php echo $results['movie']->id ?>" onclick="return confirm('Delete This Movie?')">Delete This Movie</a></p>
<?php } ?>

<?php include "templates/include/footer.php" ?>