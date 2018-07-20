<!DOCTYPE php>
<html>
<?php
include('header.php');
require_once('dao/categoryDAO.php');
require_once('dao/postDAO.php');

?>
<div class="section">
  <div class="columns is-centered">
    <div class="column is-one-third is-narrow">
    <?php
    $list = readPosts();
    while ($post = mysqli_fetch_array($list))
    {
      $userA = getUser($post['userid']);
      $username = mysqli_fetch_array($userA)['uname'];
    echo'
    <div class="card">
        <div class="card-image">
          <figure class="image">
            <img src="uploads/'.$post['image'].'">
          </figure>
        </div>
        <div class="card-content">
          <div class="media">
            <div class="media-content">
              <p class="title is-4">@'.$username.'</p>
            </div>
          </div>

          <div class="content">'.$post['text'].'
            <br>
            <time>'.$post['created'].'</time>
          </div>
        </div>
        <footer class="card-footer">
          <a href="#" class="card-footer-item" onclick="showBox('.$post['id'].'); return false;">Comment</a>
        </footer>
        <div id="commdiv'.$post['id'].'" style="display: none;">
          <textarea id="comment'.$post['id'].'" class="textarea" rows="2"></textarea>
          <a class="button is-success" onclick="sendComment('.$post['id'].'); location.reload();">Send</a>
          <br>          
        </div>
        <article class="message is-small"  name="comments-end">
          <footer class="card-footer">
            <a href="#" id="load'.$post['id'].'" class="card-footer-item" onclick="getComments('.$post[id].'); return false;">Load comments</a>
          </footer
        </article>
        </div>
        <br>';
        }
        ?>
      </div>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="container">
    <div class="content has-text-centered">
      <p>
        <strong>Camagru</strong> by bzagoni.
      </p>
    </div>
  </div>
</footer>
<script src="comments.js"></script>
</body>
</html>
