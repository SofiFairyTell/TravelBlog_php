<?php
$message = ''; 


if (isset($_POST['uploadBtn']) && $_POST['uploadBtn'] == 'Загрузить')
{
  if($user_role === "ordinary")
  {
      $_SESSION['message'] = 'Нет прав на отправку изображений';
      echo "<script type='text/javascript'>window.location.href = '../filesizeform.php';</script>";
  }
  else
  {
    $_SESSION['message'] = $user_name.', вам доступна загрузка изображений';
     if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK)
    {
      // get details of the uploaded file
      $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
      $fileName = $_FILES['uploadedFile']['name'];
      $fileSize = $_FILES['uploadedFile']['size'];
      $fileType = $_FILES['uploadedFile']['type'];
    
  //добавим надпись к загружаемому изображению
      $watermark2 = new Watermark();
      $img = imagecreatefromjpeg($fileTmpPath);
      $font = dirname(__FILE__) . '/fonts/verdana.ttf';;
      $image = $watermark2->add_watermark($img,'travelblog.ru',$font);     
      imageJPEG($img,$fileTmpPath);//выводим изображение
      imagedestroy($image);//освобождаем память

      $fileNameCmps = explode(".", $fileName);
      $fileExtension = strtolower(end($fileNameCmps));

      // sanitize file-name
      $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

      // check if file has one of the following extensions
      $allowedfileExtensions = array('jpg', 'gif', 'png');
    
      if (in_array($fileExtension, $allowedfileExtensions))
      {
        // directory in which the uploaded file will be moved
        $uploadFileDir = './uploaded_files/';
        $dowlandFileDir = '/uploaded_files/';
        $dest_path = $uploadFileDir . $newFileName;
        $dowland_path = $_SERVER['DOCUMENT_ROOT'].$dowlandFileDir. $newFileName;
        if(move_uploaded_file($fileTmpPath, $dest_path)) 
        {
          $message ='File is successfully uploaded.';
        }
        else 
        {
          $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
        }
      }
      else
      {
        $message = 'Upload failed. Allowed file types: ' . implode(',', $allowedfileExtensions);
      }
    }
    else
    {
      $message = 'There is some error in the file upload. Please check the following error.<br>';
      $message .= 'Error:' . $_FILES['uploadedFile']['error'];
    }
    //Добавление изображения в таблицу
    uploadIMG($newFileName, $dowland_path, $user_name);
    echo "<p> Скачать изображение по ссылке:</p> <a href= ./scriptphp/dowland.php?path=$dowland_path> Скачать изображение </a></p>";
    //unset ($_SESSION['message']);
    }
 
}

?> 
 
     