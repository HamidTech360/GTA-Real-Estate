<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>LEARNING PDO</h1>

    <?php

    $host = "localhost";
    $username = "root";
    $password = "";

    try{
        $connect = new PDO("mysql:host=$host;dbname=pdo", $username, $password);
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo 'connection created successfully';
    }catch(PDOException $e)
    {
        echo 'failed to establish connection';
        echo $e->getMessage();
    }

   try{
    $insert = "INSERT INTO record (firstname, lastname, email)VALUES('meda', 'mond', 'email')";
    $connect->exec($insert);

    echo 'record inserted successfully';


   }catch(PDOException $e){
       echo $e->getMessage();
       echo 'failed to insert';
   }
?>
</body>
</html>