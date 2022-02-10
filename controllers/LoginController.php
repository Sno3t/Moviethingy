<?php

declare(strict_types = 1);

class LoginController
{

    private ConnectionController $conn;

    public function __construct(){
        $this->conn = new ConnectionController();
    }

    /**
     * Login system
     */
    function login(string $user, string $pass): bool
    {

        if (empty ($user)) {
            return false;
        } else {
            $username = filter_var($user, FILTER_SANITIZE_EMAIL);
        }

        if (empty($pass)) {
            return false;
        } else {
            $password = filter_var($pass, FILTER_SANITIZE_STRING);
        }

        $sql = "SELECT ID, Username, Password, Admin FROM login WHERE BINARY Username = ?";

        if ($stmt = mysqli_prepare($this->conn, $sql)) {

            mysqli_stmt_bind_param($stmt, "s", $param_username);


            $param_username = $username;

            if (mysqli_stmt_execute($stmt)) {

                mysqli_stmt_store_result($stmt);

                // Kijk of naam bestaat
                if (mysqli_stmt_num_rows($stmt) == 1) {

                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password, $admin);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            session_start();
                            if ($admin === 1) { //default in mijn database = 0
                                $_SESSION['loggedin'] = true;
                                $_SESSION ['username'] = $username;
                                $_SESSION ['id'] = $id;
                                $_SESSION ['admin'] = true;

                            } else {
                                $_SESSION['loggedin'] = true;
                                $_SESSION ['username'] = $username;
                                $_SESSION ['id'] = $id;

                            }

                            header("location: tonen/medenwerkerstonen.php");
                            exit;


                        } else {
                            // Verkeerd wachtwoord
                            echo "Verkeerd wachtwoord of username";
                            header('refresh:2;url=login.php');

                        }
                    }
                } else {
                    // Username bestaat niet
                    echo "Verkeerd wachtwoord of username";
                    header('refresh:2;url=login.php');

                }
            } else {
                // statement gaat fout
                echo "Dit hoort niet te gebeuren, go back.";

            }


            mysqli_stmt_close($stmt);
        }

        mysqli_close($conn);


    }


}