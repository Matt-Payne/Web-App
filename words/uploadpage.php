<html>
      <script language=JavaScript>
      function popUp(){

        var user = confirm("All Data Will Be Deleted, Proceed?")
        if (user == true){
          // delete the data in the database
          <?php
            $password = // get the password
            $connection = new mysqli('localhost','wordsroot',$password ,'words');
            $query = "Delete * from wordsTable ;";


            $result = $connection->query( $query );



            $connection->close();
            header("Location: allDeleted.php");


          ?>

        }
      }
      /*function check(){
        var see = document.forms["upload1"]["take"].value;
        if (see == ""){
          alert("File Was Not Chosen");
          return false;
        }
        else {
          // add <li> see </li>
          var user = confirm("Upload file?" + see);
          if (user == true ){

            header("Location: uploadfile.php");
          }
        }
        // took out onclick in "take"
      }*/

      function verify(form){
        file = form.elements["fileToUpload"];

        if ((file.value != null) && (file.value != "")){
            return confirm("Upload " + file.value + "?");

        }
        alert("File Was Not Chosen");
        return false;

      }
      </script>
      <body>
        <h3>Admin</h3>
        <h3>Upload Data</h3>
        <form name="upload1" enctype="multipart/form-data" action="uploadfile.php" method="post" onsubmit="return verify(this);">
            <input type="hidden" name="MAX_FILE_SIZE" value="1000" />
            Filename
            <input type="file" name="fileToUpload" id="fileToUpLoad" size="30" /><br />
      <p>
            <input type="submit" name="take" value="Upload" />
      </p>
      </form>
        <h3>Delete Data</h3>
        <button onclick="popUp()">Delete</button>
      </body>


</html>
