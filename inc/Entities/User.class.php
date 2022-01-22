<?php

    class User{
        private $_id;
        private $fName;
        private $lName;
        private $email;
        private $gender;
        private $jobTitle;
        private $pic;

        public function getId(){ return $this->_id; }
        public function getFirstName(){ return $this->fName; }
        public function getLastName(){ return $this->lName; }
        public function getEmail(){ return $this->email; }
        public function getGender(){ return $this->gender; }
        public function getJobTitle(){ return $this->jobTitle; }
        public function getPic(){ return $this->pic; }

        public function setId($newId){
            $this->_id = $newId;
        }

        public function setFirstName(string $nFname){
            $this->fName = $nFname; 
        }
        public function setLastName(string $nLname){
            $this->lName = $nLname;
        }
        public function setEmail(string $nEmail){
            $this->email = $nEmail;
        }
        public function setGender(string $nGender){
            $this->gender = $nGender;
        }
        public function setJobTitle(string $nJob){
            $this->jobTitle = $nJob;
        }
        public function setPic(string $nPic){
            $this->pic = $nPic;
        }

    }