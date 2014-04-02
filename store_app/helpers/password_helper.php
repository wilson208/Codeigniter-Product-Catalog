<?php
function passwordHash($password){
    return hash("sha256", $data['password']);
}