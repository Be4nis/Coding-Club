<html>
<body>
<?php
#require_once realpath(__DIR__ . '/../.env');

// Looing for .env at the root directory
#$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
#$dotenv->load();
#DBname=> env('DB',false)
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];
$severname = getenv('IP');
require_once "config.php";
#$DBname = "bzhDB";
#$sql_user = "bzhang";
#$sql_pass = "LowerSharkSaddle";
#$db = mysqli_connect('localhost', 'my_user', 'my_password', 'my_db');
#$db = mysqli_connect($servname, $username, $password, $database);

$custDB = connectToDB($DBname, $sql_user, $sql_pass);


$sql = "INSERT INTO Coding (Name, Email, Message) VALUES ('$name', '$email', '$message')";
$result = mysqli_query($custDB, $sql);
if (!$result) {
        echo "Errorcode: " . mysqli_errno($custDB).PHP_EOL;
        echo "SQL: ".$sql.PHP_EOL;
        die("Failed to insert record to customer table!");
}
echo "Succesfully sent to database!";
?>
<br>
<h1>Back to Main Page</h1>
 <a href="https://webdev.iquark.ca/~bzhang/Coding/index.html">Back To Main Page</a>
<?php
function connectToDB($database, $username, $password) {
        $servername = getenv('IP');
        #$db = mysqli_connect($servername, $username, $password, $database);
        $db = mysqli_connect('localhost', $username, $password, $database);
        if (mysqli_connect_errno($db)) {
                echo "<script>";
                echo 'alert("UserInfo:'. $username.' ## '.$password. ' Error connecting to database '.$database.'. Your connection has probably timed out. Please log in again");';
#echo "window.location='index.php';";
                echo "</script>";
#       header("Location: index.php"); 
#       echo "Failed to connect to MySQL database $database : " . 
                mysqli_connect_error();
#       die("Program terminated");
        }   
        return $db;
}
?>
</body>
</html>