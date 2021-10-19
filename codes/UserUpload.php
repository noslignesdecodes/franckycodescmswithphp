<?php
use franckycodes\database\LightDb;

class UserUpload
{ 
    protected $name;
    protected $size;
    protected $type;
    protected $tempFolder;
    protected $extension;
    protected $acceptableExtensions;
    protected $isReady; // is ready to upload
    protected $mNewFileName;
    protected $title;
    protected $description;
    protected $category;
    protected $mOriginalImage;
    protected $mNewFolder;
    protected $idArticle;
    protected $tool;
    protected $uploader;
    protected $table;
    protected $stock;
    protected $price;
    private $bookId;
    private $pureContent;
    private $challengeId;
    private $subFolder;
    private $tableName;
    private $projectId;

    // protected $error;
    /*
     *
     * File class constructor
     *
     */
    public function __construct($user, $file, $title = 'pas de titre', $description = 'pas de description', $projectId = 0)
    {
        $this->projectId      = $projectId;
        $this->tableName      = 'appuserfileupload';
        $this->pureContent    = '';
        $this->price          = 0;
        $this->stock          = 0;
        $this->bookId         = 0; // ici book id joue le role de conteneur (scalable)
        $this->challengeId    = 0;
        $this->table          = new LightDb();
        $this->size           = 0;
        $this->name           = "";
        $this->mOriginalImage = '';
        $this->mNewFolder     = '';
        $this->title          = ($title);
        $this->description    = ($description);
        $this->category       = '';
        $this->init($file);
        $this->idArticle = 0;
        $this->uploader  = $user;
        $this->subFolder = '';
        //$arr = ['a', 'b', 'c', 'd', 'e', 'f', 'g','h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
        //misafidy ny sous-dossier, atao aleatoire, mila enregistrena anaty base de donnee
        $this->subFolder = '';
    }

    protected function init($file)
    {
        if (isset($file) and $file["error"] == 0) {
            $this->name       = $file["name"];
            $this->size       = $file["size"];
            $this->type       = $file["type"];
            $this->tempFolder = $file["tmp_name"]; // get the foloder name where the file is temporarily saved
            // extension
            $this->extension            = \pathinfo($file["name"])["extension"];
            $this->acceptableExtensions = [
                "mp4",
                "png",
                'svg',
                "gif",
                "jpeg",
                'jpg',
                'pdf',
                'txt',
                'rov',
                'zip',
            ];
            $this->isReady = $this->check() ? true : false;
        } else {
            echo '<div class="error">File not ready , size = ' . $this->size . '</div>';
        }
    }

    /*
     *
     * File class destructor
     *
     */

    public function __destruct()
    {

    }

    /*
     *
     * checking file size and file extension
     *
     */

    protected function check()
    {
        if (in_array(strtolower($this->extension), $this->acceptableExtensions)) {
            //no file size checking for now..
            return true;
            /* if ($this->isSource ()) {
        return true;
        } else if ($this->isImage ()) {
        $size = $this->size;
        // if ($size > 1024) {
        // $size = round ( $size / 1024, 2 );
        // return $size < 1000 ? true : false; // if image less than 1MB, it's ok
        // } else {
        // return true;
        // }
        // echo 'une image';
        return true;
        } else if ($this->isVideo ()) {
        $size = $this->size;
        $size = round ( $size / (1024 * 1024), 2 );
        return ($size < 50) ? true : false; // if video's size less than 10MB, it's ok
        } */
        } else {
            echo '<div class="error">';
            echo "<p>Error, I can not upload the file!</p>";
            echo '<p>Izao ny olana<br>Taille du fichier = ' . ($this->extension == 'mp4' ? $this->size . " MB" : $this->size . "KB") . ", maybe the file is too big!";
            echo " na tsy ekena ilay `extension`";
            echo "<br>Ireto avy ireo extensions ekena ";
            $this->showacceptableExtensions();
            echo "</p>";
            echo '</div>';
            return false;
        }
    }

    /*
     *
     * here some get and set methods
     *
     */

    public function getExtension()
    {
        return $this->extension;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getUploadedFileName()
    {
        return $this->mNewFileName;
    }

    /*
     *
     * get id of the uploader
     *
     */

    protected function getUploader()
    {
        return false;
    }

    protected function uploadZip()
    {

    }

    protected function uploadSource()
    {

        $this->table->query('INSERT INTO posts(name, extension, content, datePost, category , size, title, type ) ' . 'VALUES(:pname, :pextension, :pcontent, NOW(), :pcategory , :psize, :ptitle, :ptype)', true, [
            'pname'      => $this->mNewFileName,
            'pextension' => $this->extension,
            'pcontent'   => $this->description,
            'pcategory'  => $this->category,
            'psize'      => $this->size,
            'ptitle'     => $this->title,
            'ptype'      => 'source',
        ]);
        return true;
    }

    protected function uploadPdf()
    {

        $saved = true;
        $query = insertQuery($this->tableName);
        echo $query;
        //check
        $checkUpload = $this->table->query('SELECT * FROM appuserfileupload WHERE user_id=:qUser
            AND projectid=:qProject', true,
            ['qUser'   => $this->uploader->getAll('id'),
                'qProject' => $this->projectId], true, true);
        if (!isset($checkUpload['id'])) {
            $this->table->query($query, true,
                ['puser_id'        => $this->uploader->getAll('id'),
                    'pfilename'        => $this->mNewFileName,
                    'pfileextension'   => $this->extension,
                    'pfilesize'        => $this->size,
                    'pfiletype'        => "zip",
                    'pfiletitle'       => $this->title,
                    'pfiledescription' => $this->description,
                    'pdateupload'      => getDateNow(),
                    'pprojectid'       => $this->projectId,
                    'pdateupdate'      => getDateNow(),
                    'pis_deleted'      => 0,
                    'pis_valid'        => 0]);
        } else {
            alertUser($this->uploader->getAll('id'), 'already submited', $this->projectId);
            return false;
        }

        return $saved;
    }

    protected function uploadAudio()
    {

        $this->table->query('INSERT INTO app_page_file_upload(user_id,file_name,file_extension,file_size,file_type,file_title,file_description,date_upload)
      VALUES(:appPageId,
        :fileName,
        :fileExtension,
        :fileSize,
        :fileType,
        :fileTitle,
        :fileDescription, NOW())', true, ['appPageId' => $this->uploader->getId(),
            'fileName'                                        => $this->mNewFileName,
            'fileExtension'                                   => $this->extension,
            'fileSize'                                        => $this->size,
            'fileType'                                        => "audio",
            'fileTitle'                                       => $this->title,
            'fileDescription'                                 => $this->description,
        ]
        );

        //susceptible hi-produire bug
        $saved = (int) $this->table->query('SELECT id FROM app_page_file_upload WHERE user_id=:user AND file_type="audio" ORDER BY date_upload DESC LIMIT 0,1', true, ['user' => $this->uploader->getId()], true, true)['id'];
        //$this->uploader->alert('image uploaded', $id);
        //}

        return $saved;
    }

    protected function uploadVideo()
    {

        $saved = true;
        $query = insertQuery($this->tableName);
        echo $query;
        if ($this->projectId > 0) {
            //check
            $checkUpload = $this->table->query('SELECT * FROM appuserfileupload WHERE user_id=:qUser
            AND projectid=:qProject', true,
                ['qUser'   => $this->uploader->getAll('id'),
                    'qProject' => $this->projectId], true, true);
            if (!isset($checkUpload['id'])) {
                $this->table->query($query, true,
                    ['puser_id'        => $this->uploader->getAll('id'),
                        'pfilename'        => $this->mNewFileName,
                        'pfileextension'   => $this->extension,
                        'pfilesize'        => $this->size,
                        'pfiletype'        => "video",
                        'pfiletitle'       => $this->title,
                        'pfiledescription' => $this->description,
                        'pdateupload'      => getDateNow(),
                        'pprojectid'       => $this->projectId,
                        'pdateupdate'      => getDateNow(),
                        'pis_deleted'      => 0,
                        'pis_valid'        => 0]);
            } else {
                alertUser($this->uploader->getAll('id'), 'already submited', $this->projectId);
                return false;
            }
        } else {
//just upload not submit
            $this->table->query($query, true,
                ['puser_id'        => $this->uploader->getAll('id'),
                    'pfilename'        => $this->mNewFileName,
                    'pfileextension'   => $this->extension,
                    'pfilesize'        => $this->size,
                    'pfiletype'        => "video",
                    'pfiletitle'       => $this->title,
                    'pfiledescription' => $this->description,
                    'pdateupload'      => getDateNow(),
                    'pprojectid'       => 0,
                    'pdateupdate'      => getDateNow(),
                    'pis_deleted'      => 0,
                    'pis_valid'        => 0,
                    'pis_profile'      => 0,
                    'pis_cover'        => 0,
                ]);
        }

        return $saved;

    }

    protected function uploadArticle()
    {
        $typeId = 0;

        $this->table->query('INSERT INTO userposts (idVisitor, name, extension,
            content, pure_content, datePost, category , size, title, type,
            stock, vidiny, article_id) VALUES
            (:user, :pname, :pextension,
            :pcontent, :noCode, NOW(), :pcategory ,
            :psize, :ptitle, :ptype, :articleStock, :articlePrice, :articleId)', true, [
            'articleId'    => $typeId,
            'noCode'       => $this->pureContent,
            'articleStock' => $this->stock,
            'articlePrice' => $this->price,
            'user'         => (int) $this->uploader->getId(),
            'pname'        => $this->mNewFileName,
            'pextension'   => $this->extension,
            'pcontent'     => $this->description,
            'pcategory'    => $this->category,
            'psize'        => $this->size,
            'ptitle'       => $this->title,
            'ptype'        => 'image',
        ]);
    }

    protected function uploadProduct()
    {
        $this->table->query('INSERT INTO userposts (idVisitor, name, extension,
            content, pure_content, datePost, category , size, title, type,
            stock, vidiny, product_id) VALUES
            (:user, :pname, :pextension,
            :pcontent, :noCode, NOW(), :pcategory ,
            :psize, :ptitle, :ptype, :articleStock, :articlePrice, :productId)', true, [
            'productId'    => $typeId,
            'noCode'       => $this->pureContent,
            'articleStock' => $this->stock,
            'articlePrice' => $this->price,
            'user'         => (int) $this->uploader->getId(),
            'pname'        => $this->mNewFileName,
            'pextension'   => $this->extension,
            'pcontent'     => $this->description,
            'pcategory'    => $this->category,
            'psize'        => $this->size,
            'ptitle'       => $this->title,
            'ptype'        => 'image',
        ]);
    }

    protected function uploadBook()
    {
        $this->table->query('INSERT INTO userposts (idVisitor, bookId, name, extension,
            content, pure_content, datePost, category , size, title, type,
            stock, vidiny, challenge_id, tutorial_id) VALUES
            (:user, :book, :pname, :pextension,
            :pcontent, :noCode, NOW(), :pcategory ,
            :psize, :ptitle, :ptype, :articleStock, :articlePrice,:challengeId,:tutorialId)', true, [
            'book'         => $typeId,
            'challengeId'  => 0,
            'tutorialId'   => 0,
            'noCode'       => $this->pureContent,
            'articleStock' => $this->stock,
            'articlePrice' => $this->price,
            'user'         => (int) $this->uploader->getId(),
            'pname'        => $this->mNewFileName,
            'pextension'   => $this->extension,
            'pcontent'     => $this->description,
            'pcategory'    => $this->category,
            'psize'        => $this->size,
            'ptitle'       => $this->title,
            'ptype'        => 'image',
        ]);
    }

    protected function uploadChallenge()
    {
        $this->table->query('INSERT INTO userposts (idVisitor, bookId, name, extension,
            content, pure_content, datePost, category , size, title, type,
            stock, vidiny, challenge_id, tutorial_id) VALUES
            (:user, :book, :pname, :pextension,
            :pcontent, :noCode, NOW(), :pcategory ,
            :psize, :ptitle, :ptype, :articleStock, :articlePrice,:challengeId,:tutorialId)', true, [
            'book'         => 0,
            'challengeId'  => $typeId,
            'tutorialId'   => 0,
            'noCode'       => $this->pureContent,
            'articleStock' => $this->stock,
            'articlePrice' => $this->price,
            'user'         => (int) $this->uploader->getId(),
            'pname'        => $this->mNewFileName,
            'pextension'   => $this->extension,
            'pcontent'     => $this->description,
            'pcategory'    => $this->category,
            'psize'        => $this->size,
            'ptitle'       => $this->title,
            'ptype'        => 'image',
        ]);
    }

    protected function uploadTutorial()
    {
        $this->table->query('INSERT INTO userposts (idVisitor, bookId, name, extension,
            content, pure_content, datePost, category , size, title, type,
            stock, vidiny, challenge_id, tutorial_id) VALUES
            (:user, :book, :pname, :pextension,
            :pcontent, :noCode, NOW(), :pcategory ,
            :psize, :ptitle, :ptype, :articleStock, :articlePrice,:challengeId,:tutorialId)', true, [
            'book'         => 0,
            'challengeId'  => 0,
            'tutorialId'   => $typeId,
            'noCode'       => $this->pureContent,
            'articleStock' => $this->stock,
            'articlePrice' => $this->price,
            'user'         => (int) $this->uploader->getId(),
            'pname'        => $this->mNewFileName,
            'pextension'   => $this->extension,
            'pcontent'     => $this->description,
            'pcategory'    => $this->category,
            'psize'        => $this->size,
            'ptitle'       => $this->title,
            'ptype'        => 'image',
        ]);
    }

    protected function uploadImage()
    {
        $saved = true;
        $query = insertQuery($this->tableName);
        echo $query;
        if ($this->projectId > 0) {
            //check
            $checkUpload = $this->table->query('SELECT * FROM appuserfileupload WHERE user_id=:qUser
            AND projectid=:qProject', true,
                ['qUser'   => $this->uploader->getAll('id'),
                    'qProject' => $this->projectId], true, true);
            if (!isset($checkUpload['id'])) {
                $this->table->query($query, true,
                    ['puser_id'        => $this->uploader->getAll('id'),
                        'pfilename'        => $this->mNewFileName,
                        'pfileextension'   => $this->extension,
                        'pfilesize'        => $this->size,
                        'pfiletype'        => "image",
                        'pfiletitle'       => $this->title,
                        'pfiledescription' => $this->description,
                        'pdateupload'      => getDateNow(),
                        'pprojectid'       => $this->projectId,
                        'pdateupdate'      => getDateNow(),
                        'pis_deleted'      => 0,
                        'pis_valid'        => 0,
                        'pis_profile'      => 0,
                        'pis_cover'        => 0]);
            } else {
                alertUser($this->uploader->getAll('id'), 'already submited', $this->projectId);
                return false;
            }
        } else {
//just upload not submit
            $this->table->query($query, true,
                ['puser_id'        => $this->uploader->getAll('id'),
                    'pfilename'        => $this->mNewFileName,
                    'pfileextension'   => $this->extension,
                    'pfilesize'        => $this->size,
                    'pfiletype'        => "image",
                    'pfiletitle'       => $this->title,
                    'pfiledescription' => $this->description,
                    'pdateupload'      => getDateNow(),
                    'pprojectid'       => 0,
                    'pdateupdate'      => getDateNow(),
                    'pis_deleted'      => 0,
                    'pis_valid'        => 0,
                    'pis_profile'      => 0,
                    'pis_cover'        => 0]);
        }

        return $saved;
    }

    public function img($src = '', $alt = 'A simple picture from francky', $title = 'This is a simple picture', $class = '', $id = '')
    {
        $src = file_exists($src) ? $src : '#';
        return '<img src="' . $src . '" alt="' . $alt . '" title="' . $title . '" class="' . $class . '" id="' . $id . '">';
    }

    public function resizeImage($originalImage, $dest_folder, $width = 32, $height = 32)
    {
        $pathinfo            = pathinfo($originalImage);
        $destination         = imagecreatetruecolor($width, $height);
        $largeur_destination = imagesx($destination);
        $hauteur_destination = imagesy($destination);

        $newName = $dest_folder . '' . $pathinfo['filename'] . '.' . $pathinfo['extension'];
        if (preg_match('/jpg|jpeg/i', $pathinfo['extension'])) {
            $source = imagecreatefromjpeg($originalImage);
            imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, imagesx($source), imagesy($source));

            imagejpeg($destination, $newName);
        } else if ($pathinfo['extension'] === 'png') {
            $source = imagecreatefrompng($originalImage);
            imagecopyresampled($destination, $source, 0, 0, 0, 0, $largeur_destination, $hauteur_destination, imagesx($source), imagesy($source));
            imagepng($destination, $newName);
        }
        return $newName;
    }

    protected function moveMedium($folder)
    {
        if ($this->category === 'post') {
            $resizedImage = $this->resizeImage($this->mOriginalImage, $this->mNewFolder . '' . $this->subFolder() . '' . $folder, 175, 150);
        } else {
            $resizedImage = $this->resizeImage($this->mOriginalImage, $this->mNewFolder . '' . $this->subFolder() . '' . $folder);
        }
        // echo '<br>';
        $this->img($resizedImage);
    }

    private function createProfile($folder, $width = 200, $height = 200)
    {
        $this->resizeImage($this->mOriginalImage, $this->mNewFolder . '' . $folder, $width, $height);
    }

    protected function moveMiniature($folder, $width = 120, $height = 120)
    {
        //if(isset($_POST['noThumbnail']) AND $_POST['noThumbnail']=='on') {
        if ($this->category === 'post') {
            $resizedImage = $this->resizeImage($this->mOriginalImage, $this->mNewFolder . '' . $folder, $width, $height);
        } else {
            $resizedImage = $this->resizeImage($this->mOriginalImage, $this->mNewFolder . '' . $folder);
        }
        //}
        // echo '<br>';
        // $this->img ( $resizedImage );
    }

    public function isProfile()
    {
        return preg_match('#profil#', $this->category) ? true : false;
    }

    private function esorinaBanga($text)
    {
        $text = preg_replace('#\'|[ ]#', '-', $text);
        return $text;
    }

    protected function generateName()
    {
        $randomName = substr(sha1(rand(0, 100)), 0, 8) . '-' . substr(md5(rand(0, 100)), 0, 8) . '-' . substr(md5(rand(0, 100)), 0, 8) . '-' . substr(md5(rand(0, 100)), 0, 8) . '.' . $this->extension;
        // if ($this->isSource ()) {
        //     if ($this->extension == 'zip') {
        //         $this->mNewFileName = $this->esorinaBanga ( $this->title ) . '-' . $randomName;
        //     } else {
        //         $this->mNewFileName = $this->extension . '-source-code-' . $randomName;
        //     }
        // } else if ($this->extension != 'mp4') {
        //     $this->mNewFileName ='file-' . $randomName;
        // } else {
        //     if ($this->category === 'adult') {
        //         $this->mNewFileName = 'some-adult-video-' . $randomName;
        //     } else {
        //         $this->mNewFileName = 'some-web-video-' . $randomName;
        //     }
        //     $this->mNewFileName = 'some-web-video-' . $randomName;
        // }
        $this->mNewFileName = '000' . $this->uploader->getAll('id') . $randomName;
    }

    protected function organizeImage($subFolder = 'a/')
    {
        if (preg_match('/adult/i', $this->category)) {
            $this->moveMiniature('adult/');
        } else {
            $this->moveMiniature('thumbnail/');
            //$this->createProfile('../profile/'); //cree un profile 100x100
        }
        // echo '<hr/><p>' . $this->title . '</p>';
        // echo '<p>' . $this->description . '</p>';
    }

    protected function choice()
    {
        if ($this->isImage()) {

            return $this->uploadImage();
        } elseif ($this->isVideo()) {

            echo 'You\'re about to upload a video';
            return $this->uploadVideo();
        } else if ($this->isAudio()) {
            return $this->uploadAudio();
        } else {
            //zip file
            return $this->uploadPdf();
        }
        //  else if ($this->isSource ()) {
        //     return $this->uploadSource ();
        // }
    }

    protected function isSource()
    {
        return preg_match('#java|cpp|js|html|php|c|exe|zip|pdf|txt#i', $this->extension) ? true : false;
    }

    protected function isImage()
    {
        return preg_match('#jpg|jpeg|gif|png|svg#i', $this->extension) ? true : false;
    }

    public function isVideo()
    {
        return preg_match('#mp4#', $this->extension) ? true : false;
    }

    public function isPdf()
    {
        return preg_match('#pdf|zip|js|c|cpp|h|java|rar|css|txt#', $this->extension) ? true : false;
    }

    public function isAudio()
    {
        return preg_match('#ogg|mp3|wav#', $this->extension) ? true : false;
    }

    protected function display()
    {
        if ($this->isImage()) {
            echo '<img src = "' . FRANCKWEBROOT . 'upload/members/' . $this->uploader->getId() . 'image/' . $this->subFolder . '' . $this->mNewFolder . '' . $this->mNewFileName . '" alt="" >';
            $this->organizeImage();
        } else if ($this->isVideo()) {
            echo '<video src="' . $this->mNewFolder . '' . $this->mNewFileName . '" controls></video>';
        }
    }

    public function congratulations()
    {
        // echo "<p>Arahabaina, voafindra tsara ao @ ilay dossier " . realpath($this->mNewFolder) . " ilay fichier vaovao.";
        // echo '<p>Ny anaran \'ilay sary ' . $this->mNewFileName . '</p>';
        if ($this->isImage()) {
            $this->organizeImage();
        }
        echo 'filename: ' . $this->mNewFileName;
        // $this->display ();
    }

    /*
     *
     * uploading the file
     *
     */

    public function upload($newFolder = 'uploads/')
    {

        $uploaded = false;

        //$this->mNewFolder = $this->isImage () ? $newFolder.'image/' : ($this->isVideo () ? $newFolder . 'video/' : $newFolder . 'source/');

        if ($this->isImage()) {
            $this->mNewFolder = $newFolder . 'image/';
        } else if ($this->isVideo()) {
            $this->mNewFolder = $newFolder . 'video/';
        } else if ($this->isAudio()) {
            $this->mNewFolder = $newFolder . 'audio/';
        } else {
            echo '<br>source zan<br>';
            $this->mNewFolder = $newFolder . 'source/';
        }

        if ($this->isReady) {

            // echo '<hr><p>Ok, thanks</p>';
            // echo "<p>----------------------------<br>Cool, ao tsara ny havesatr'ilay `fichier vaovao`";
            // echo "(File size= '" . round($this->size / 1024, 2) . "' Ko)";
            // echo "<br>Ao tsara ihany koa ny 'extension'";
            // echo "<p>Extension= '" . $this->extension . "' <br>";
            // echo 'Taille du fichier ' . $this->size . "</p>";
            // given new name to the new uploaded file
            $this->generateName();
            $this->mOriginalImage = $this->mNewFolder . '' . $this->mNewFileName;

            //downloading the file
            if ($this->choice()) {
                if (move_uploaded_file($this->tempFolder, $this->mOriginalImage)) {
                    echo 'uploaded';
                    $this->congratulations();
                    // exec('sudo -s chmod -R a+wr '.FRANCKWEBROOT.'upload/');
                    $uploaded = true;
                }
            } else {
                echo 'cant upload file';
            }
        }
        return $uploaded;
    }

    /*
     *
     * showing extension
     *
     */

    protected function showacceptableExtensions()
    {
        for ($i = 0, $c = count($this->acceptableExtensions); $i < $c; $i++) {
            echo $this->acceptableExtensions[$i] . ", ";
        }
    }

}
