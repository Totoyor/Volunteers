<?php

class AdminModel extends AppModel
{

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function getEvent($id)
	{
	    try {
	        $query = $this->connexion->prepare("SELECT *
	        FROM vol_events
	        LEFT JOIN vol_event_pictures
	        ON vol_events.idEvent = vol_event_pictures.vol_events_idEvent
	        LEFT JOIN vol_event_missions
	        ON vol_events.idEvent = vol_event_missions.vol_events_idEvent
	        LEFT JOIN vol_events_categories_has_vol_events
	        ON vol_events.idEvent = vol_events_categories_has_vol_events.vol_events_idEvent
	        LEFT JOIN vol_events_categories
	        ON vol_events_categories_has_vol_events.vol_events_categories_idCategorie = vol_events_categories.idCategorie
	        LEFT JOIN vol_event_questions
	        ON vol_events.idEvent = vol_event_questions.vol_events_idEvent
	        LEFT JOIN vol_users
	        ON vol_events.vol_users_idUser = vol_users.idUser
	        WHERE vol_events.idEvent = :id
	        AND vol_events.vol_event_status_idEventStatus = :status
	        GROUP BY idEvent
	        ");

	        $query->bindValue(':id', $id, PDO::PARAM_INT);
	        $query->bindValue(':status', 1, PDO::PARAM_INT);
	        $query->execute();

	        $data = $query->fetch(PDO::FETCH_ASSOC);
	        $query->closeCursor();
	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @return array|bool
	 */
	public function getEvents()
	{
	    try {
	        $query = $this->connexion->prepare("SELECT *
	        FROM vol_events
	        LEFT JOIN vol_event_pictures
	        ON vol_events.idEvent = vol_event_pictures.vol_events_idEvent
	        LEFT JOIN vol_event_missions
	        ON vol_events.idEvent = vol_event_missions.vol_events_idEvent
	        LEFT JOIN vol_events_categories_has_vol_events
	        ON vol_events.idEvent = vol_events_categories_has_vol_events.vol_events_idEvent
	        LEFT JOIN vol_events_categories
	        ON vol_events_categories_has_vol_events.vol_events_categories_idCategorie = vol_events_categories.idCategorie
	        WHERE vol_events.vol_event_status_idEventStatus = :status
	        GROUP BY idEvent
	        ");

	        $query->bindValue(':status', 1, PDO::PARAM_INT);
	        $query->execute();
	        $data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query->closeCursor();

	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @param $idEvent
	 * @return array|bool
	 */
	public function getMissions($idEvent)
	{
	    try {
	        $query = $this->connexion->prepare("SELECT * FROM vol_event_missions
	        WHERE vol_events_idEvent = :id");

	        $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
	        $query->execute();

	        $data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query->closeCursor();

	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @param $idEvent
	 * @return array|bool
	 */
	public function getQuestions($idEvent)
	{
	    try{

	        $query = $this->connexion->prepare("SELECT * FROM vol_event_questions
	        LEFT JOIN vol_events_answers
	        ON vol_event_questions.idEventQuestions = vol_events_answers.vol_event_questions_idEventQuestions
	        LEFT JOIN vol_users
	        ON vol_event_questions.vol_users_idUser = vol_users.idUser
	        WHERE vol_events_idEvent = :id");

	        $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
	        $query->execute();

	        $data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query->closeCursor();

	        return $data;

	    } catch (Exception $e) {
	        die($e);
	        return false;
	    }
	}

	/**
	 * @param $idEvent
	 * @return array|bool
	 */
	public function getNbVolunteers($idEvent)
	{
	    try {
	        $query = $this->connexion->prepare("SELECT SUM(nbVolunteer)
	        FROM vol_event_missions
	        WHERE vol_events_idEvent = :id");

	        $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
	        $query->execute();

	        $data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query->closeCursor();

	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @param $idEvent
	 * @return array|bool
	 */
	public function getMedias($idEvent) {
	    try {
	        $query = $this->connexion->prepare("SELECT *
	        FROM vol_event_pictures
	        WHERE vol_events_idEvent = :id");

	        $query->bindValue(':id', $idEvent, PDO::PARAM_INT);
	        $query->execute();

	        $data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query->closeCursor();

	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @param $idEvent
	 * @return array|bool
	 */
	public function getVolunteers($idEvent) {
	    try {

	        $query = $this->connexion->prepare("SELECT *
	        FROM event_has_volunteers
	        LEFT JOIN vol_users
	        ON event_has_volunteers.vol_event_volunteers_idEventVolunteer = vol_users.idUser
	        WHERE event_has_volunteers.vol_events_idEvent = :idEvent
	        GROUP BY idUser
	        ");

	        $query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);
	        $query->execute();
	        $data = $query->fetchAll(PDO::FETCH_ASSOC);

	        $query->closeCursor();

	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @return array|bool
	 */
	public function getCategories()
	{
	    try {
	        $query = $this->connexion->prepare("SELECT * FROM vol_events_categories");
	        $query->execute();

	        $data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query->closeCursor();
	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @return array|bool
	 */
	public function getUsers()
	{
	    try {
	        $query = $this->connexion->prepare("SELECT *
	        FROM vol_users
	        LEFT JOIN vol_users_pictures
	        ON vol_users.idUser = vol_users_pictures.idPictures
	        GROUP BY idUser
	        ");
	        $query->execute();
	        $data = $query->fetchAll(PDO::FETCH_ASSOC);
	        $query->closeCursor();

	        return $data;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	/**
	 * @param $id
	 * @return bool|mixed
	 */
	public function getUser($id)
	{
	    try {
	        $query = $this->connexion->prepare("SELECT *
	        FROM vol_users
	        LEFT JOIN vol_users_pictures
	        ON vol_users.idUser = vol_users_pictures.idPictures
	        WHERE idUser = :id
	        ");

	        $query->bindValue(':id', $id, PDO::PARAM_INT);
	        $query->execute();

	        $data = $query->fetch(PDO::FETCH_ASSOC);
	        $query->closeCursor();
	        return $data;

	    } catch (Exception $e) {
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

	public function disconnect()
	{
	    session_unset();
	    session_destroy();
	    unset($_COOKIE['fbsr_941553679268599']);
	    header('Location:?');
	    exit();
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
}