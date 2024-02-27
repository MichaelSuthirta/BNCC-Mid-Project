<?php

    $connection="";
    $stmt="";

    function connectToDB(){
        $servername="localhost";
        $username="root";
        $password="";
        $dbName="attendance_system";
        $dataSource="mysql:host=" .  $servername . ";dbname=" . $dbName;
        
        try{
            $connection=new PDO($dataSource, $username, $password);
            return $connection;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return null;
        }
    }

    function closeConnection(){
        $connection=null;
        $stmt=null;
    }

    connectToDB();

    function register($data){
        $connection=connectToDB();
        $stmt=$connection->prepare("SELECT * FROM `userlogin` WHERE email=?");

        $stmt->execute([
            $data["email"],
        ]);

        $user=$stmt->fetch();

        if($user){
            $hashPass=md5($data["password"]);

            if($hashPass===$user["password"] && $user["email"]==="admin@gmail.com"){
                $_SESSION["login"]=true;

                if(isset($data["rembMe"])){
                    setcookie("email",$data["email"],time()+3600);
                }
                header("Location: dashboard.php");
            }
            else{
                echo "<script>alert('Wrong Password. Try again.');</script>";
            }
        }
        else{
            echo "<script>alert('Data not found.');</script>";
        }

        closeConnection();
    }

    function getData(){
        $connection=connectToDB();
        $stmt=$connection->query("SELECT * FROM `userlogin`");
        $userData = [];
        while($uData=$stmt->fetch(PDO::FETCH_ASSOC)){
            array_push($userData,$uData);
        }
        return $userData;

        closeConnection();
    }

    function checkEmail($data){
        $connection = connectToDB();
    
        $stmt = $connection->prepare("SELECT COUNT(*) FROM userlogin WHERE email = ?");
    
        $stmt->execute([
            $data["email"]
        ]);
    
        $sameEmail = (bool)$stmt->fetchColumn();
    
        closeConnection();
    
        return $sameEmail;
    }

    function addUser($data,$img){
        $connection=connectToDB();

        $stmt = $connection->prepare("SELECT COUNT(*) FROM userlogin");
        $stmt->execute();
        $userCount=$stmt->fetchColumn();

        $ID = 'U' . str_pad($userCount + 1, 3, '0', STR_PAD_LEFT);

        $stmt = $connection->prepare("SELECT COUNT(*) FROM userlogin WHERE firstName = ?");
        $stmt->execute([$data["first"]]);
        $sameFirst=$stmt->fetchColumn();

        if($samePass){
            $password=$data["first"].$data["last"]."123";
        }
        else{
            $password=$data["first"]."123";
        }

        $hashPass=md5($password);

        move_uploaded_file($img["tmp_name"], "../images/" . $img["name"]);


        $stmt = $connection->prepare("INSERT INTO userlogin(id,photo,firstName,lastName,email,password,bio) VALUES(?,?,?,?,?,?,?)");
        $stmt->execute([$ID,$img["name"],$data["first"],$data["last"],$data["email"],$hashPass,$data["bio"],]);

        closeConnection();
    }

    function getProfile($id){
        $connection = connectToDB();

        $stmt = $connection->prepare("SELECT * FROM userlogin WHERE id = :user_id");
    
        $stmt->bindParam(':user_id', $id);
        $stmt->execute();

        $profileData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $profileData;
    
        closeConnection();
    }

    

    function deleteUser($data){
        $connection=connectToDB();

        $stmt = $connection->prepare("DELETE FROM userlogin WHERE id = ?");

        $stmt->execute([
            $data["id"]
        ]);

        closeConnection();
    }

?>