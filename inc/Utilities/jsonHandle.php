<?php
    require_once("Utilities/Converters/UserConvert.class.php");
    
    if(isset($_POST)){
        $allUsers = UserConvert::convertIntoUser(
            json_decode(file_get_contents("inc/data/users.json"))
        );
        var_dump($allUsers);
    }
    function test(){
        $allUsers = UserConvert::convertIntoUser(
            json_decode(file_get_contents("inc/data/users.json"))
        );
        if(isset($_POST)){
            $search = $_POST["search"];
            for($i = 0; $i < count($allUsers); $i++){
                if(str_starts_with($search,$allUsers[$i]->getFirstName())){
                    $result = $allUsers[$i];
                    break;
                }
            }   
        }
        echo $result->getFirstName();
    }
    