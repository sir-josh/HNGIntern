<?php
$databasename = "customer";
$servername= "localhost";
$username = "root";
$password = "";

// create database connection
 $createCon = new mysqli($servername,$username,$password,$databasename);

//checking for connection status
 if($createCon -> connect_error){
     die("Connection failed:".$createCon->connect_error);
 }
if(isset($_POST["submit"])){
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $hobby = $_POST['hobby'];

    $queryStatement = "INSERT INTO users (Firstname,Lastname,Email,Phonenumber,Hobby) VALUES ('$firstname','$lastname','$email','$phoneno','$hobby')";
    if ($createCon->query($queryStatement) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $queryStatement . "<br>" . $createCon->error;
    }
}


?>

<doctype html>
<html>
<head>
    <title>simple php code</title>
</head>

<body>
   <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
       <div class="forminput"> Firstname: <input type="text" name="firstname" placeholder="Enter your firstname"> </div><br/>

       <div class="forminput"> Lastname: <input type="text" name="lastname" placeholder="Enter your lastname"> </div><br/>

       <div class="forminput">  Email: <input type="email" name="email" placeholder="Enter your Email"> </div><br/>

       <div class="forminput">  Phone Number: <input type="text" name="phoneno" placeholder="Enter your Phone number"> </div><br/>

       <div class="forminput"> Hobby: <textarea name="hobby"> </textarea> </div><br/>

       <button type="submit" name="submit" class="button">submit</button>
   </form>
</body>
</html>

<?php
     if(isset($_POST["submit"])) {
         $sql = "SELECT id, Firstname, Hobby FROM users WHERE Email='$email'";
         $result = $createCon->query($sql);

         if ($result->num_rows > 0) {
             // output data from a row
             while ($row = $result->fetch_assoc()) {
                 echo "Hi " . $row["Firstname"] . ", you do really love" . $row["Hobby"] . " and you are number ".$row["id"]." on database list<br>";
             }
         }
     }
?>