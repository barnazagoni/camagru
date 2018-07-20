<!DOCTYPE php>
<?php
include('header.php');
require_once('dao/categoryDAO.php');
require_once('dao/postDAO.php');

session_start();
require_once('dao/postDAO.php');
if(isset($_POST["submit"]))
{
    if ($_SESSION["current_user"] != "" && $_POST["imgbase64"] != NULL)
    {
        //save to database
        $data = $_POST["imgbase64"];
        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);
        $unique = uniqid();
        file_put_contents('uploads/img'.$unique.'.jpeg', $data);
        save_post('img'.$unique.'.jpeg', $_POST["text"], $_SESSION["current_user"]);
        header('Location: index.php');
    }
    else
    {
        if ($_SESSION["current_user"] == "")
        {
            header('Location: login.php');
        }
        else
        {
            echo "An error has occured. Most likely your camera isn't on or your device doesn't have one";
        }
    }
}
?>

<html>
<div class="section">
  <div class="columns is-centered">
    <div class="column is-half is-narrow">
    <form method="POST" id="maincolumn">
        <div class="field">
        <div id="vid-container">
            <video id='video'></video>
        </div>
            <br>
            <canvas style="display:none;" id="canvas"></canvas>
            <img id="imgcont"></img>
        </div>
        <input type="hidden" name="imgbase64"/>
        <input type="hidden" name="stickername"/>
        <div class="field is-grouped is-centered">
                <figure class="control image is-128x128">
                    <img src="stickers/1.png" id="1">
                </figure>
                <figure class="control image is-128x128">
                    <img src="stickers/2.png" id="2">
                </figure>
                <figure class="control image is-128x128">
                    <img src="stickers/3.png" id="3">
                </figure>
        </div>
        <div class="field">
            <div class="control">
                <textarea name="text" class="textarea" placeholder="Caption your image" maxlength="140"></textarea>
            </div>
            <br>
            <div class="control">
                <input class="button is-primary is-outlined" type="submit" name="submit" value="Share" onclick="saveImage();"/>
            </div>
        </div>
        </form>
        </div>
        <div class="column is-one-fifth">
        <?php
        require_once('dao/postDAO.php');
        session_start();
        $list = getPostsUser($_SESSION["current_user"]);
        while ($post = mysqli_fetch_array($list))
        {
            echo'<figure class="image is-4by3">
            <img src="uploads/'.$post["image"].'">
          </figure>';
        }
        ?>
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
<script src="pic.js"></script>
<script>
var canvas = document.getElementById('canvas'),
        context = canvas.getContext('2d'),
        output = document.getElementById('imgcont'),
        column = document.getElementById('maincolumn');
var loadFile = function(event)
{
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function()
    {
        canvas.width = column.offsetWidth;
        canvas.height = column.offsetWidth*output.height/output.width;
        context.drawImage(output, 0,0, output.width, output.height);
        document.getElementById("canvas").style.display = "";
        output.style.display="none";
        saveImage();
    }
}
var saveImage = function()
{
    var imagedata = canvas.toDataURL('image/jpeg', 1.0);
        document.getElementsByName("imgbase64")[0].setAttribute("value", imagedata);
}
</script>
</body>
</html>