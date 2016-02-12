<?php

/**

 *Class servant à l'upload de fichiers
 *@author Jordan La Mantia / Leopold de Lassence

 */

Class Upload
{


    private $_fileName;
    private $_tmpName;
    private $_fileExt;
    public $_newFile; //Nouveau nom du fichier avec son extension.
    private $_urlDest;
    private $_folderDest;
    private $_fileSize;
    private $_imageSize;
    private $_file_max_size;
    private $_imageExtOk = array('.jpg','.jpeg','.gif','.png');
    /*private $_fileExtOk = array('.doc','.docx','.pdf','.xlsx','.xls','.zip','.mwb',
        '.bak','.pages','.psd','.aep','.ai','.docm','.indd','.itdb','.itl','.php','.js',
        '.css','.html','.jpe','.jps','.sql','.eot','.svg','.ttf','.woff','.mp3','.mp4','.mov',
        '.pptx','.rb','.txt','.url','.xlc','.zim');*/
    /*private $_extOk = array('.jpg','.jpeg','.gif','.png','.doc','.docx','.pdf','.xlsx','.xls','.zip','.mwb',
        '.bak','.pages','.psd','.aep','.ai','.docm','.indd','.itdb','.itl','.php','.js',
        '.css','.html','.jpe','.jps','.sql','.eot','.svg','.ttf','.woff','.mp3','.mp4','.mov',
        '.pptx','.rb','.txt','.url','.xlc','.zim');*/
    private $_extOk = array('.jpg','.jpeg','.gif','.png');

    /**
     *Constructeur de la classe Mail
     *@param string fileOrigin = Nom d'origine du fichier uploader
     *@param string tmpName = Nom temporaire du fichier
     *@param string urlDest =  Url de desination du fichier
     *@param string imageSize =  Le taille dans laquel sera redimensionner l'image si spécifié.
     *@return true ou false
     *@author Jordan La Mantia / Leopold de Lassence
     */

    public function __construct($fileOrigin, $tmpName, $urlDest, $imageSize){

        //Initialiser les paramètres
        $this->_fileName = md5(uniqid(mt_rand()));
        $this->_tmpName = $tmpName;
        $this->_fileExt = strrchr($fileOrigin, ".");
        $this->_newFile = $this->_fileName."".$this->_fileExt;
        $this->_urlDest = $urlDest."". $this->_fileName."".$this->_fileExt;
        $this->_folderDest = $urlDest;

        if ($imageSize !== '') {
            $this->_imageSize = $imageSize;
        }

        /** On récupère la taille de l'image ou du fichier uploadé,
        on assigne le bon dossier d'upload (Files ou images).
         */
        if (in_array($this->_fileExt, $this->_imageExtOk)) {
            $this->_fileSize = getimagesize($this->_tmpName);
        }else{
            $this->_fileSize = filesize($this->_tmpName);
        }

    }

    //On vérifie que l'extension du fichier est bonne
    /**
     *Fonction qui vérifie si l'extension du fichier est prise en compte
     *@param L'extension du fichier
     *@param Les différentes extension prises en charges
     *@return true ou false
     *@author Jordan La Mantia / Leopold de Lassence
     */
    public function extControl(){


        if (in_array($this->_fileExt, $this->_extOk)) {
            return true;
        }else{
            return false;
        }
    }

    /**
     *Fonction qui controle que le fichier ne soit pas trop gros
     */
    /*public function sizeControl(){
        if($this->_filesize <= $this->_file_max_size)
        {
            return true;
        }
        else
        {
            return false;
        }
    }*/

    //On déplace le fichier dans le dossier voulue.
    /**
     *Fonction qui déplace le fichier dans le répertoire voulue
     *@param Le chemin vers le dossier de destination
     *@return true ou false
     *@author Jordan La Mantia / Leopold de Lassence
     */
    public function moveFile(){

        if (file_exists($this->_folderDest)) {
            if (move_uploaded_file($this->_tmpName, $this->_urlDest)) {
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    //Redimensionner l'image
    /**
     *Fonction qui redimmensionne l'image à la taille voulue
     *@param l'extension du fichier voulue
     *@return true ou false
     *@author Jordan La Mantia / Leopold de Lassence
     */
    public function resizeFile(){

        if ($this->_imageSize !== null){

            if ($this->_fileExt == ".jpg") {

                $image = imagecreatefromjpeg($this->_urlDest);
                $width = imagesx($image);
                $height = imagesy($image);

                if ($width > $height) {
                    //format horizontal
                    $new_width = $this->_imageSize;
                    $new_height = ($new_width * $height) / $width;
                }else {
                    //format vertical
                    $new_height = $this->_imageSize;
                    $new_width = ($new_height * $width) / $height;
                }

                try {
                    $thumb = imagecreatetruecolor($new_width, $new_height);
                    imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagejpeg($thumb, "assets/img/events/uploads/".$this->_fileName.".min".$this->_fileExt, 90);
                    imagedestroy($image);
                    return true;
                } catch (Exception $e) {
                    return false;
                }

            }elseif ($this->_fileExt == ".png") {

                $image = imagecreatefrompng($this->_urlDest);
                $width = imagesx($image);
                $height = imagesy($image);

                if ($width > $height) {
                    //format horizontal
                    $new_width = $this->_imageSize;
                    $new_height = ($new_width * $height) / $width;
                }else {
                    //format vertical
                    $new_height = $this->_imageSize;
                    $new_width = ($new_height * $width) / $height;
                }

                try {
                    $thumb = imagecreatetruecolor($new_width, $new_height);
                    imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagejpeg($thumb, "assets/img/events/uploads/".$this->_fileName.".min".$this->_fileExt, 90);
                    imagedestroy($image);
                    return true;
                } catch (Exception $e) {
                    return false;
                }

            }elseif ($this->_fileExt == ".gif") {

                $image = imagecreatefromgif($this->_urlDest);
                $width = imagesx($image);
                $height = imagesy($image);

                if ($width > $height) {
                    //format horizontal
                    $new_width = $this->_imageSize;
                    $new_height = ($new_width * $height) / $width;
                }else {
                    //format vertical
                    $new_height = $this->_imageSize;
                    $new_width = ($new_height * $width) / $height;
                }

                try {
                    $thumb = imagecreatetruecolor($new_width, $new_height);
                    imagecopyresized($thumb, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
                    imagejpeg($thumb, "assets/img/events/uploads/".$this->_fileName.".min".$this->_fileExt, 90);
                    imagedestroy($image);
                    return true;
                } catch (Exception $e) {
                    return false;
                }

            }
        }
    }

    public function setNom(){
        $file_name = $this->_newFile;
        return $file_name;
    }


    public function setMaxFileSize($value){
        if (!$value)
        {
            $value = 1000000;
        }
        else
        {
            $this->_file_max_size = $value;
        }
    }

}
