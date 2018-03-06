
<html>

    <body>
      <h3>Admin</h3>
      <h3>Uploading data</h3>
      <?php

          $connection = new mysqli('localhost','wordsroot','password','words');



          $numberOfWords = 0;
          $checker = false;


          $target_dir = "uploads/";
          $target_file = $target_dir . basename($_FILES["fileToUpLoad"]["name"]);
          move_uploaded_file($_FILES["fileToUpload"]["randomName"], $target_file);

          $fh = fopen($target_file, 'r');
          while (!feof($fh)){
              // are the lines read in strings?
              $user = fgets($myfile);
              if (strpos($user,'-') && $checker == false ){
                  $checker = true;

              }
              if ($checker == true){
                  $numberOfWords = $numberOfWords + 1;

                  $query = "insert into wordstable (entry) values($user);";
                  $connection->query($query);
              }
          }
          echo "Words added:" + $numberOfWords;
      ?>
    </body>




</html>
