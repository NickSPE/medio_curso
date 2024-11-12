<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        session_start();
        if( $_SERVER["REQUEST_METHOD"]=="POST") {

            //echo "<br>";
            //echo "SE EMVIARON LAS SIQUIENTES VARIABLES";
            //echo "<br>";
            //echo $_POST["txtusername"];
            //echo "<br>";
            //echo $_POST["txtpassword"];
            $v_username ="";
            $v_password = "";

            if(isset( $_POST["txtusername"])){
                $v_username = $_POST["txtusername"];
            }

            if(isset( $_POST["txtpassword"])){
                $v_password =$_POST["txtpassword"];
            }
            if(($v_username == "admin")&& ($v_password=="1234")){
                $_SESSION["txtusername"]=$v_username;
                $_SESSION["txtpassword"]=$v_password;
                header('Location: http://127.0.0.1/medio_curso/dashboard.php');
                //echo "dashboard";
            }else{
                //header("Location : claveequivocada.php");
                header('Location: http://127.0.0.1/medio_curso/claveequivocada.php');
                //echo "claveequivocada";
            }

        }
        //en caso de que el ususario preciones directamente sobre la URL inicial
        //hay un usuario logueado asiq ue le pongo en pantalla 
        if(isset($_SESSION["txtusername"])){
            header('Location: http://127.0.0.1/medio_curso/dashboard.php');

        }

    ?>


    <div class="login-container">
        <form action="" method="POST">
            <label for="username">Username</label>
            <input type="text" name="txtusername" id="txtusername" placeholder="username">
        
            <label for="password">Password</label>
            <input type="password"  name="txtpassword" placeholder="Password" id="txtpassword" required>
        
            <button type="submit">LOGIN</button>
        </form>
    </div>
</body>
</html>
