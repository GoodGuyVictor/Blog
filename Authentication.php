<?php
/**
 * Created by PhpStorm.
 * User: victo
 * Date: 8/26/2018
 * Time: 2:06 PM
 */

namespace blog\authentication;


use blog\db\Db;
require_once ("Db.php");

class Authentication
{
    const SALT = "kldf439f28jjb809kd2l1jd0x0q4";
    private $db;
    private $error;

    public function __construct()
    {
        session_start();
        $this->db = Db::getInstance();
        $this->error = "";
    }


    public function signup()
    {
        if(!$_POST["username"]) {
            $this->error .= "<li>Username cannot be blank</li>";
        }

        if(!$_POST["password"]) {
            $this->error .= "<li>Password cannot be blank</li>";
        }

        if(!$_POST["repeat-password"]) {
            $this->error .= "<li>Passwords do not match</li>";
        }

        if(!$_POST["email"]) {
            $this->error .= "<li>Email cannot be blank</li>";
        }

        if($this->error) {
            $this->error = '<div class="alert alert-danger"><h5>The following error(s) occurred:</h5><ul>' . $this->error . '</ul></div>';
            $_SESSION["error-message"] = $this->error;
            header("Location: signup.php");
            exit;
        } else {
            $sql = "SELECT username FROM user WHERE username LIKE '" . $_POST["username"] . "'";
            $result = $this->db->sqlSelectQuery($sql);

            //check if entered username is unique
            if($result) {
                $this->error .= '<li>Such username is already taken</li>';
            } else {
                //if username is ok next check passwords match
                if($_POST["password"] == $_POST["repeat-password"]) {
                    //if passwords match next check the uniqueness of email
                    $sql = "SELECT email FROM user WHERE email LIKE '". $_POST["email"] . "'";
                    $result = $this->db->sqlSelectQuery($sql);

                    if($result) {
                        $this->error .= '<li>A user with such email already exists</li>';
                    } else {
                        //eventually if all data are okay inserts them into data base (encrypts password first)
                        $securedPass = md5(self::SALT . md5($_POST["password"]));
                        $sql = "INSERT INTO user (username, password, email) VALUES ('".$_POST["username"]."', '".$securedPass."', '".$_POST["email"]."')";

                        $this->db->sqlQuery($sql);

                        $_SESSION["logged_in"] = true;
                        $_SESSION["username"] = $_POST["username"];

                        $sql = "SELECT id FROM user WHERE username LIKE '".$_POST["username"]."'";
                        $result = $this->db->sqlSelectQuery($sql);
                        $row = $result->fetch();
                        $_SESSION["user_id"] = $row["id"];
                    }
                } else {
                    $this->error .= "<li>Passwords don't match</li>";
                }
            }

            if($this->error) {
                $this->error = '<div class="alert alert-danger"><h5>The following error(s) occured:</h5><ul>' . $this->error . '</ul></div>';
                $_SESSION["error-message"] = $this->error;
                header("Location: signup.php");
                exit;
            } else {
                unset($_SESSION["error-message"]);
                header('Location: index.php');
                exit;
            }
        }
    }

    public function login()
    {
        if(!$_POST["username"]) {
            $this->error .= "<li>Username cannot be blank</li>";
        }

        if(!$_POST["password"]) {
            $this->error .= "<li>Password cannot be blank</li>";
        }


        if($this->error) {
            $this->error = '<div class="alert alert-danger"><h5>The following error(s) occurred:</h5><ul>' . $this->error . '</ul></div>';
            $_SESSION["error-message"] = $this->error;
            header("Location: login.php");
            exit;
        } else {
            $sql = "SELECT * FROM user WHERE username LIKE '" . $_POST["username"] . "'";
            $result = $this->db->sqlSelectQuery($sql);

            //if specified username is found check password next
            if($result) {
                $row = $result->fetch();

                $enteredPass = md5(self::SALT . md5($_POST["password"]));
                $dbPass = $row["password"];
                $dbUsername = $row["username"]; //$dbUsername === $_POST["username"]
                $userId = $row["id"];

                if($enteredPass === $dbPass) {
                    $_SESSION["logged_in"] = true;
                    $_SESSION["user_id"] = $userId;
                    $_SESSION["username"] = $dbUsername;
                } else {
                    $this->error .= "<li>Incorrect password</li>";
                }
            } else {
                $this->error = "<li><p>The username is not found</p><p>Please try different username or create new account</p></li>";
            }

            if($this->error) {
                $this->error = '<div class="alert alert-danger"><h5>The following error(s) occured:</h5><ul>' . $this->error . '</ul></div>';
                $_SESSION["error-message"] = $this->error;
                header("Location: login.php");
                exit;
            } else {
                unset($_SESSION["error-message"]);
                header("Location: ".$_SERVER['HTTP_REFERER']);
                exit;
            }
        }
    }
}