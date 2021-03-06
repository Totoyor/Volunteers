<?php

class HomeModel extends AppModel
{
    /** Modèle de récupération des 6 derniers évènements pour la homepage
     * @return array|bool
     */
    public function getHomeEvents()
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
            ORDER BY dateCreate
            LIMIT 0,6
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

    /** Modèle de récupération des 2 évènements premium pour les afficher sur la homepage
     * @return array|bool
     */
    public function getPremiumEvents()
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
            ORDER BY dateCreate
            LIMIT 0,2
            ");

            $query->bindValue(':status', 2, PDO::PARAM_INT);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();

            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle de récupération de 5 catégories pour la homepage
     * @return array|bool
     */
    public function getHomeCategories()
    {
        try {
            $query = $this->connexion->prepare("SELECT * FROM vol_events_categories
                                                LIMIT 0,5 ");
            $query->execute();

            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $query->closeCursor();
            return $data;

        } catch (Exception $e) {
            return false;
        }
    }

    /** Modèle d'insertion de l'email de l'utilisateur dans la base de donnée
     * @param $email
     * @return bool
     */
    public function insertNewsletter($email)
    {
        try {
            $query = $this->connexion->prepare("INSERT INTO vol_newsletter (email)
                                                VALUES (:email)");

            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $query->closeCursor();

            return true;

        } catch (Exception $e) {
            return false;
        }
    }
}