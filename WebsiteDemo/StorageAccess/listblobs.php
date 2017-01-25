<?php
require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

$connectionString='DefaultEndpointsProtocol=http;AccountName=storagedemo007;AccountKey=9DtmFFqa+60gB2j4vLWEji3+wlOZ359nv04IUXuxTklXGiuJo0NOjO+QFLY09BY1ps8h8uAZ5ItGD3Du2ouogw==';

// Create blob REST proxy.
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);


try    {
    // List blobs.
    $blob_list = $blobRestProxy->listBlobs("family");
    $blobs = $blob_list->getBlobs();

    foreach($blobs as $blob)
    {
        //echo $blob->getName().": --> ".$blob->getUrl()."<br />";
        if(strstr($blob->getName(), "Mayur"))
        {
            $image_path = $blob->getUrl();
            //echo "Image Path = " . $image_path . "<br />";
        }
    }
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}
?>