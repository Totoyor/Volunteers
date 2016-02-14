<?php

class UserModel extends AppModel
{
    /** Modèle d'inscription de l'utilisateur dans la base de donnée
     * @param $email
     * @param $password
     * @param $status
     * @param $key
     * @return bool
     */
    public function inscriptionUser($email, $password, $status, $key)
    {
        try {
            $query = $this->connexion->prepare('INSERT INTO vol_users (Password, Email, vol_user_status_idStatus, UserKey)
                                                VALUES (:password, :email, :status, :key)');

            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->bindParam(':status', $status, PDO::PARAM_INT);
            $query->bindParam(':key', $key, PDO::PARAM_INT);
            $query->execute();
            $query->closeCursor();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle de participation d'un utilisateur à un evenement
     * @param $idEvent
     * @param $idUser
     * @param $status
     * @return bool
     */
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

    /** Modèle de vérification de la clé unique de l'utilisateur
     * @param $key
     * @return bool|mixed
     */
    public function checkKey($key)
    {
        try {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE UserKey = :key');

            $query->bindParam(':key', $key, PDO::PARAM_INT);
            $query->execute();
            $user = $query->fetch();

            $nbrRow = $query->rowCount();
            if ($nbrRow === 1) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle de validation du compte de l'utilisateur
     * @param $key
     * @param $active
     * @return bool
     */
    public function validateUser($key, $active)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_users SET Active = :active WHERE UserKey = :key");

            $query->bindValue(':key', $key, PDO::PARAM_STR);
            $query->bindValue(':active', $active, PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            echo "Erreur MYSQL, impossible : " . $e->getMessage();
        }
    }

    /** Modèle de verification de l'email de l'utilisateur
     * @param $email
     * @return bool|mixed
     */
    public function checkEmail($email)
    {
        try {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE Email = :email');

            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            $nbrRow = $query->rowCount();
            if ($nbrRow === 1) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle de changement du mot de passe de l'utilisateur
     * @param $email
     * @param $newpass
     * @return bool
     */
    public function changePassword($email, $newpass)
    {
        try {
            $query = $this->connexion->prepare("UPDATE vol_users SET Password = :password WHERE Email = :email");

            $query->bindValue(':password', $newpass, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);

            $query->execute();
            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            echo "Erreur MYSQL, impossible : " . $e->getMessage();
        }
    }

    /** Modele de verification du mot de passe utilisateur
     * @param $id
     * @return bool|mixed
     */
    public function checkPassword($id)
    {
        try {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE idUser = :id');

            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();
            $user = $query->fetch();

            return $user;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle d'annulation de la participation à l'évènement
     * @param $idVolunteer
     * @param $idEvent
     * @return bool
     */
    public function cancelJoin($idVolunteer, $idEvent)
    {
        try {
            $query = $this->connexion->prepare("DELETE FROM event_has_volunteers
            WHERE vol_events_idEvent = :idEvent
            AND vol_event_volunteers_idEventVolunteer = :idVolunteer");

            $query->bindParam(':idEvent', $idEvent, PDO::PARAM_INT);
            $query->bindParam(':idVolunteer', $idVolunteer, PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle de connexion de l'utilisateur a son compte
     * @param $email
     * @param $password
     * @return bool|mixed
     */
    public function connexionUser($email, $password)
    {
        try {
            $query = $this->connexion->prepare('SELECT * FROM vol_users
                                                WHERE Email = :email
                                                 AND Password = :password');

            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':password', $password, PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch();

            $nbrRow = $query->rowCount();
            if ($nbrRow === 1) {
                return $user;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * Supression d'un user
     * @param $options
     * @return bool
     */
    public function deleteUser($options)
    {
        try
        {
            // Requête DELETE
            $query = "BEGIN;

	        DELETE FROM vol_events_categories_has_vol_events
	        WHERE vol_events_idEvent = ".$options.";

	        DELETE FROM vol_event_missions
	        WHERE vol_events_idEvent = ".$options.";

	        DELETE FROM vol_event_pictures
	        WHERE vol_events_idEvent = ".$options.";

	        DELETE FROM vol_events_answers
	        WHERE vol_events_idEvent = ".$options.";

	        DELETE FROM vol_event_questions
	        WHERE vol_events_idEvent = ".$options.";

			DELETE FROM event_has_volunteers
			WHERE vol_events_idEvent = ".$options.";

	        DELETE FROM vol_events
	        WHERE idEvent = ".$options.";

	        COMMIT;";

            // Traitement de la requete
            $cursor = $this->connexion->query($query);
            $cursor->closeCursor();

            return true;
        }
        catch (Exception $e)
        {
            return false;
        }
    }
}