<?php
require_once 'vendor/autoload.php';

use WindowsAzure\Common\ServicesBuilder;
use MicrosoftAzure\Storage\Common\ServiceException;

$connectionString='DefaultEndpointsProtocol=https;AccountName=storagedemo007;AccountKey=c4mJp2wjmWhzFSsyzWbrzOnrwzs/Je3CBFRPcm4DlaUqbd1TCjVGgjbIPkhxnpdUNMf8+vLDoYlQWiByfSaBcQ==;EndpointSuffix=core.windows.net';

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
