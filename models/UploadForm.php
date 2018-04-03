<?php

namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => ''],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $data_path = $this->makeUploadPath("uploads/file/".date('mY'));
            
            $uniqid = uniqid();
            $path = 'uploads/file/'.date('mY');
            $this->imageFile->saveAs($path .'/'.$uniqid.'.'. $this->imageFile->extension);

            return $path.'/'. $uniqid . '.' . $this->imageFile->extension;

        } else {
            return false;
        }
    }

    public function makeUploadPath($output)
    {
        $path['full'] = $_SERVER['DOCUMENT_ROOT'] .'/'. $output;
        $path['relative'] = $output;

        $upload_directories = explode('/', $path['full']);
        $createDirectory = array();

        foreach ($upload_directories as $upload_directory){
            $createDirectory[] = $upload_directory;
            $createDirectoryPath = implode('/',$createDirectory);

            if(!is_dir($createDirectoryPath) && !empty($createDirectoryPath)){
                $old = umask(0); 
                mkdir($createDirectoryPath, 0775);// Create the folde if not exist and give permission
                umask($old);
            }               
        }

        return $path;
    }

}
?>