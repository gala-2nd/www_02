<?php

namespace Models\Upload {
    class FileTypeEnum
    {
        const IMAGE = 1;
    }
    class FileUploader
    {
        // private string $uploadPath='';
        function FileUpload(string $tmpPath, string $uploadPath)
        {
            // move_uploaded_file($tmpPath,$uploadPath);
            if (move_uploaded_file($tmpPath, $uploadPath)) {
                return true;
            }
            return false;
            // $this->uploadPath = $uploadPath;
        }
    }
}
