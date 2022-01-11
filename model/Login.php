<?php

class Login
{
    public static function login(mysqli $conn,$username,$password){
        return $conn->query("SELECT username FROM korisnik WHERE username='$username' AND password='$password'");
    }
}