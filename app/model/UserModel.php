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
                return $user;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function inscriptionUser($email, $password, $status, $key)
    {
        try
        {
            $query = $this->connexion->prepare('INSERT INTO vol_users (Password, Email, vol_user_status_idStatus, UserKey)
                                                VALUES (:password, :email, :status, :key)');

            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_INT);
            $query->bindParam(':key', $key, PDO::PARAM_INT);
            $query->execute();
            $query->closeCursor();
            
            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function join($idEvent, $idUser, $status)
    {
        try {
            $query = $this->connexion->prepare('INSERT INTO event_has_volunteers (vol_events_idEvent, vol_event_volunteers_idEventVolunteer, vol_event_volunteer_status)
                                                VALUES (:idEvent, :idUser, :status)');

            $query->bindParam(':idEvent', $idEvent, PDO::PARAM_STR);
            $query->bindParam(':idUser', $idUser, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            die($e);
            return false;
        }
    }
    
    public function checkKey($key)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE UserKey = :key');

            $query->bindParam(':key', $key, PDO::PARAM_INT);
            $query->execute();
            $user = $query->fetch();

            $nbrRow = $query->rowCount();
            if ($nbrRow === 1)
            {
                return $user;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $e)
        {
            return false;
        }
    }
    
    public function validateUser($key, $active)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_users SET Active = :active WHERE UserKey = :key");

            $query->bindValue(':key', $key, PDO::PARAM_STR);
            $query->bindValue(':active', $active, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;

        }
        catch (Exception $e) {
            echo "Erreur MYSQL, impossible : ".$e->getMessage();
        }
    }

    public function checkEmail($email)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE Email = :email');

            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            $nbrRow = $query->rowCount();
            if ($nbrRow === 1)
            {
                return $user;
            }
            else
            {
                return false;
            }
        }
        catch (Exception $e)
        {
            return false;
        }
    }

    public function changePassword($email, $newpass)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_users SET Password = :password WHERE Email = :email");

            $query->bindValue(':password', $newpass, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);

            $query->execute();
            $query->closeCursor();

            return true;

        }
        catch (Exception $e) {
            echo "Erreur MYSQL, impossible : ".$e->getMessage();
        }
    }

    public function checkPassword($id)
    {
        try
        {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE idUser = :id');

            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $user = $query->fetch();

            return $user;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}