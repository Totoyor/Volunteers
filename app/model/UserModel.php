<?php

class UserModel extends AppModel
{
    public function connexionUser($email, $password)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT * FROM blog_users
                                                WHERE user_email = :email
                                                 AND user_pass = :password');

            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            $nbrRow = $query->rowCount();
            if ($nbrRow === 1)
            {
                $_SESSION["user_login"] = $user["user_login"];
                $_SESSION['user_id'] = $user['ID'];
                $_SESSION['user_email'] = $user['user_email'];
                return true;
            }
            else
            {
                $_SESSION["login"] = false;
                return false;
            }
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function inscriptionUser($nom, $prenom, $email, $password)
    {
        try
        {
            $query = $this->connexion->prepare('INSERT INTO blog_users (user_pass, user_email, display_name, user_login)
                                                VALUES (:password, :email, :prenom, :nom)');

            $query->bindParam(':nom', $nom, PDO::PARAM_STR);
            $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();

            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

}