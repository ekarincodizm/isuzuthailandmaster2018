<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Upload extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => '','maxSize'=>'50000000'],
        ];
    }

    public function upload($file_tmp)
    {
       
        $this->makeUploadPath("web/uploads/file/".date('mY'));
        $uniqid = uniqid();
        $path = 'uploads/file/'.date('mY').'';
       // $this->imageFile->saveAs($path .'/'.  $uniqid  . '.' . $this->imageFile->extension);

        $data_extension = explode('/',$file_tmp['type']) ;
        $extension = $data_extension[1];
        if($data_extension[0] == 'application'){
            $data_extension = explode('.',$file_tmp['name']);
            $extension = end($data_extension);
        }

        @move_uploaded_file($file_tmp['tempName'],$path.'/'.$uniqid.'.'.$extension);
        return $path.'/'. $uniqid . '.' . $extension;

    }

    public function uploadfile($file_tmp,$data){
        $index = $file_tmp['index'];
        $file_type = $file_tmp['type'];
        // $job_id = $data['job_id'];
        // $member_id = $data['member_id'];
        $uniqid = uniqid();

        move_uploaded_file($file_tmp['tempName'],"uploads/file/".$uniqid.$file_type);
        return $uniqid;
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