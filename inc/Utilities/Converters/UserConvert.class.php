<?php
    require_once("inc/Entities/User.class.php");
    class UserConvert{

        private static function convertStdToUser($userStd){
            $newUser = null;
            try{
                if(get_class($userStd) != "stdClass"){
                    throw new Exception("This is not a valid data! id: ".$userStd->id,5);
                } else {
                    $newUser = new User();
                    $newUser->setId($userStd->id);
                    $newUser->setFirstName($userStd->fName);
                    $newUser->setLastName($userStd->lName);
                    $newUser->setEmail($userStd->email);
                    $newUser->setGender($userStd->gender);
                    $newUser->setJobTitle($userStd->jobTitle);
                    $newUser->setPic($userStd->pic);   
                }
                return $newUser;
            } catch (Exception $ex){
                echo $ex->getMessage();
            }
        }

        private static function convertUserToStd($userObj){
            $newStd = null;
            try{
                if(get_class($userObj) != "User"){
                    throw new Exception("This is not a valid data!",6);
                } else {
                    $newStd = new stdClass;
                    $newStd->fName = $userObj->getFirstName();
                    $newStd->lName = $userObj->getLastName();
                    $newStd->email = $userObj->getEmail();
                    $newStd->gender = $userObj->getGender();
                    $newStd->jobTitle = $userObj->getJobTitle();
                    $newStd->pic = $userObj->getPic();   
                }
                return $newStd;
            } catch (Exception $ex){
                echo $ex->getMessage();
            }
            
        }

        public static function convertIntoUser($userData){
            $result = null;
            if(is_array($userData)){
                $result = [];
                for($i = 0; $i < count($userData); $i++){
                    $result[] = self::convertStdToUser($userData[$i]);
                }
            } else {
                $result = self::convertStdToUser($userData);
            }
            return $result;
        }

        public static function convertIntoStd($userData){
            $result = null;
            if(is_array($userData)){
                $result = [];
                for($i = 0; $i < count($userData); $i++){
                    $result[] = self::convertUserToStd($userData[$i]);
                }
            } else {
                $result = self::convertUserToStd($userData);
            }
            return $result;
        }
    }