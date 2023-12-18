<?php
    require "db.php";
    
    function check_existing_email($email) {
        global $connection;
        $flag = false;

        $query = "SELECT `id` FROM `users` WHERE `email` = '".mysqli_escape_string($connection, $email)."'";
        $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) > 0) {
            $flag = true;
        }

        return $flag;
    }

    function escape_string($field) {
        global $connection;
        return mysqli_escape_string($connection, $field);
    }

    function save_registration($name, $address, $contactNumber, $email, $password) {
        global $connection;
        $users = [];

        $user_type = "user";

        $query = "INSERT INTO `users` (`name`,`address`, `contactNumber`, `email`, `password`, `user_type`) VALUES ('".escape_string($name)."', '".escape_string($address)."', '".escape_string($contactNumber)."', '".escape_string($email)."', '".escape_string($password)."', '".escape_string($user_type)."')";

        if(mysqli_query($connection, $query)) {
            $id = mysqli_insert_id($connection);
            $encrypted_password = md5(md5($id . $password)); //md5(md5(2mypassword))

            $query = "UPDATE `users` SET `password` = '".$encrypted_password."' WHERE `users`.`id` = '".$id."'";
            if(mysqli_query($connection, $query)) {
                $query = "SELECT * FROM `users` WHERE `users`.`id` = '".$id."' and `users`.`password` = '".escape_string($encrypted_password)."' LIMIT 1";
                $result = mysqli_query($connection, $query);
                $row = mysqli_fetch_array($result);

                if(!empty($row)) {
                    $users = [
                        "id" => $row['id'],
                        "name" => $row['name']
                    ];
                }
            }
        }
        
        return $users;
    }

    function login_account($email, $password)
    {
    global $connection;
    $user = [];

    $query = "SELECT * FROM `users` WHERE `users`.`email`='" . escape_string($email) . "' LIMIT 1";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_array($result);

    if (!empty($row)) {
        $hash_password = md5(md5($row['id'] . $password));
        if ($hash_password == $row['password']) {
            $user = [
                "id" => $row['id'],
                "name" => $row['name'],
            ];
        }
    }

    return $user;
    }
?>