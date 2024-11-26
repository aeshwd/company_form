<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container{
            background-color: red;
            max-width: 80%;
            margin: auto;
            padding: 20px;
            color: white;
            font-family: sans-serif;
        }

        .container h1{
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container">
     <h1>This is my First Conditional PHP Website</h1>
     <p>Your Current Party status is -</p>

  <?php 
   
   $age = 34;

   if($age > 18){
    echo "You can go to party";
   }  else if($age == 8){
    echo "You are just 8 years old";
   }  else {
    echo "You cannot go to party";
   }

   // Function

   function five(){
    echo "FIVE";
   }

   five();


   function name($name){
    echo "<br>";
    echo $name;
   }

   name("Aesh Goswami");
?>

</div>


    
</body>
</html>