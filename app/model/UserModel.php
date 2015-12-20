<?php

class UserModel extends AppModel
{
    public function connexionUser($email, $password)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE Email = :email
                                                 AND Password = :password');

            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            $nbrRow = $query->rowCount();
            if ($nbrRow === 1)
            {
                $_SESSION['user_email'] = $user['Email'];
                $_SESSION['user_id'] = $user['idUser'];
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

    public function inscriptionUser($email, $password)
    {
        try
        {
            $query = $this->connexion->prepare('INSERT INTO vol_users (Password, Email)
                                                VALUES (:password, :email)');

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