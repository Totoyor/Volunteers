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
	        GROUP BY idEvent
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
	 * @param $event_name
	 * @param $event_location
	 * @param $event_start
	 * @param $event_hour_start
	 * @param $event_end
	 * @param $event_hour_end
	 * @param $event_description
	 * @param $status
	 * @param $user
	 * @return bool|string
	 */
	public function createEvent($event_name, $event_location, $event_start, $event_hour_start, $event_end,
								$event_hour_end, $event_description, $status, $facebook, $instagram, $youtube, $twitter, $user)
	{
		try {
			$query = $this->connexion->prepare("INSERT INTO vol_events
                                        (nameEvent, startEvent, hourStartEvent, endEvent, hourEndEvent,
                                        locationEvent, descriptionEvent, facebookEvent, twitterEvent, instagramEvent, youtubeEvent, vol_event_status_idEventStatus, vol_users_idUser)
                                        VALUES (:name, :start, :hourStart, :end, :hourEnd,
                                        :location, :description, :facebook, :twitter, :instagram, :youtube, :status, :user)");

			$query->bindValue(':name', $event_name, PDO::PARAM_STR);
			$query->bindValue(':location', $event_location, PDO::PARAM_STR);
			$query->bindValue(':start', $event_start, PDO::PARAM_STR);
			$query->bindValue(':hourStart', $event_hour_start, PDO::PARAM_STR);
			$query->bindValue(':end', $event_end, PDO::PARAM_STR);
			$query->bindValue(':hourEnd', $event_hour_end, PDO::PARAM_STR);
			$query->bindValue(':description', $event_description, PDO::PARAM_STR);
			$query->bindValue(':facebook', $facebook, PDO::PARAM_STR);
			$query->bindValue(':twitter', $twitter, PDO::PARAM_STR);
			$query->bindValue(':instagram', $instagram, PDO::PARAM_STR);
			$query->bindValue(':youtube', $youtube, PDO::PARAM_STR);
			$query->bindValue(':status', $status, PDO::PARAM_STR);
			$query->bindValue(':user', $user, PDO::PARAM_STR);
			$query->execute();
			$query->closeCursor();

			//On récupère l'id de l'insertion
			$lastId = $this->connexion->lastInsertId();

			return $lastId;
			//return true;

		} catch (Exception $e) {
			die($e);
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

	public function deleteEvent($options) // à checker
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
			die($e);
	        $this->coreDbError($e);
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

	public function getCategory($id)
	{
		try {
			$query = $this->connexion->prepare("SELECT * FROM vol_events_categories WHERE idCategorie = :id");

			$query->bindValue(':id', $id, PDO::PARAM_INT);

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
	 * @return array|bool
	 */
	public function deleteCategory($id)
	{
	    try {
	        $query = $this->connexion->prepare("
	        	DELETE FROM vol_events_categories
	        	WHERE idCategorie = ".$id.";
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
	 * @param $category
	 * @return bool
	 */
	public function insertCategory($category, $picture)
	{
	    try {
	    	$query = $this->connexion->prepare("INSERT INTO vol_events_categories
	    	(nameCategorie, imageCategorie) VALUES (:category, :picture)");

			$query->bindValue(':category', $category, PDO::PARAM_STR);
			$query->bindValue(':picture', $picture, PDO::PARAM_STR);

	        $query->execute();

	        return true;

	    } catch (Exception $e) {
	        return false;
	    }
	}

	public function editCategory($category, $picture, $idCategory)
	{
		try {
			$query = $this->connexion->prepare("UPDATE vol_events_categories
	    	SET nameCategorie = :category, imageCategorie = :picture WHERE idCategorie = :id");

			$query->bindValue(':category', $category, PDO::PARAM_STR);
			$query->bindValue(':picture', $picture, PDO::PARAM_STR);
			$query->bindValue(':id', $idCategory, PDO::PARAM_INT);

			$query->execute();

			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * @param $idCategory
	 * @param $idEvent
	 * @return bool
	 */
	public function insertCategories($idCategory, $idEvent)
	{
		try {
			$query = $this->connexion->prepare("INSERT INTO vol_events_categories_has_vol_events
            (vol_events_categories_idCategorie, vol_events_idEvent) VALUES
            (:idCategory, :idEvent)");

			$query->bindValue(':idCategory', $idCategory, PDO::PARAM_INT);
			$query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

			$query->execute();

			return true;

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

	public function activateUser($iduser)
	{
		try {
			$query = $this->connexion->prepare("UPDATE vol_users SET Active = 1
												WHERE idUser = :idUser");

			$query->bindParam(':idUser', $iduser, PDO::PARAM_INT);

			$query->execute();

			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	public function disableUser($iduser)
	{
		try {
			$query = $this->connexion->prepare("UPDATE vol_users SET Active = null
												WHERE idUser = :idUser");

			$query->bindParam(':idUser', $iduser, PDO::PARAM_INT);

			$query->execute();

			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * @param $idEvent
	 * @param $missions
	 * @param $nbVolunteer
	 * @return bool
	 */
	public function insertMissions($idEvent, $missions, $nbVolunteer)
	{
		try {
			$query = $this->connexion->prepare("INSERT INTO vol_event_missions
            (missionName, nbVolunteer, vol_events_idEvent) VALUES
            (:mission, :nbVol, :idEvent)");

			$query->bindValue(':mission', $missions, PDO::PARAM_STR);
			$query->bindValue(':nbVol', $nbVolunteer, PDO::PARAM_INT);
			$query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

			$query->execute();

			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * @param $idEvent
	 * @param $coverPicture
	 * @return bool
	 */
	public function insertCoverPicture($idEvent, $coverPicture)
	{
		try {
			$query = $this->connexion->prepare("UPDATE vol_events
            SET coverPicture = :cover
            WHERE idEvent = :idEvent");

			$query->bindValue(':cover', $coverPicture, PDO::PARAM_STR);
			$query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

			$query->execute();

			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	/**
	 * @param $idEvent
	 * @param $media
	 * @return bool
	 */
	public function insertMediaPicture($idEvent, $media)
	{
		try {
			$query = $this->connexion->prepare("INSERT INTO vol_event_pictures
             (eventPicture, vol_events_idEvent) VALUES (:media, :idEvent)");

			$query->bindValue(':media', $media, PDO::PARAM_INT);
			$query->bindValue(':idEvent', $idEvent, PDO::PARAM_INT);

			$query->execute();

			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	public function update_profile($id, $first_name, $last_name, $birth_date, $email, $location, $description, $skills, $school, $work, $idpicture)
	{
		try {
			$query = $this->connexion->prepare("UPDATE vol_users SET FirstName = :firstn, LastName = :lastn, BirthDate = :birth, Email = :email, Location = :location, Description = :description, Skills = :skills, School = :school, Work = :work, vol_users_pictures_idPictures = :id_pic WHERE idUser = :id");

			$query->bindValue(':firstn', $first_name, PDO::PARAM_STR);
			$query->bindValue(':lastn', $last_name, PDO::PARAM_STR);
			$query->bindValue(':birth', $birth_date, PDO::PARAM_STR);
			$query->bindValue(':email', $email, PDO::PARAM_STR);
			$query->bindValue(':location', $location, PDO::PARAM_STR);
			$query->bindValue(':description', $description, PDO::PARAM_STR);
			$query->bindValue(':skills', $skills, PDO::PARAM_STR);
			$query->bindValue(':school', $school, PDO::PARAM_STR);
			$query->bindValue(':work', $work, PDO::PARAM_STR);
			$query->bindValue(':id', $id, PDO::PARAM_INT);
			$query->bindValue(':id_pic', $idpicture, PDO::PARAM_INT);

			$query->execute();
			$query->closeCursor();

			return true;

		}
		catch (Exception $e) {
			echo "Connexion à MYSQL impossible : ".$e->getMessage();
		}
	}

	public function editStatus($id, $status)
	{
		try {
			$query = $this->connexion->prepare("UPDATE vol_user_status SET Status = :status WHERE idStatus = :id");

			$query->bindValue(':id', $id, PDO::PARAM_INT);
			$query->bindValue(':status', $status, PDO::PARAM_STR);

			$query->execute();
			$query->closeCursor();

			return true;
		}
		catch (Exception $e) {
			echo "Erreur MYSQL, impossible : ".$e->getMessage();
		}
	}

	public function addStatus($status)
	{
		try {
			$query = $this->connexion->prepare("INSERT INTO vol_user_status
	    	(Status) VALUES (:status)");

			$query->bindValue(':status', $status, PDO::PARAM_STR);

			$query->execute();

			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	public function getProfile($id)
	{
		try {
			$query = $this->connexion->prepare("SELECT *
                                                FROM vol_users
                                                LEFT JOIN vol_users_pictures
                                                ON idPictures = vol_users_pictures_idPictures
                                                WHERE idUser = :id
                                                GROUP BY idUser");

			$query->bindValue(':id', $id, PDO::PARAM_INT);
			$query->execute();

			$data = $query->fetch();
			$query->closeCursor();

			return $data;

		} catch (Exception $e) {
			echo "Connexion à MYSQL impossible : ".$e->getMessage();
		}
	}

    public function getReview($idVolunteer)
    {
        try {
            $query = $this->connexion->prepare("SELECT * FROM vol_users_review
            LEFT JOIN vol_users
            ON vol_users_review.id_user_review = vol_users.idUser
            WHERE vol_event_volunteers_idEventVolunteer = :idVolunteer");

            $query->bindValue(':idVolunteer', $idVolunteer, PDO::PARAM_INT);

            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);

            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }
}