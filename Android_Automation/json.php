<?php

$updatedData='{"dirty_fill":"Y","capcity_check":"Y","image_test":"Y","video_test":"Y","sequential_io_write":"Y","random_io_write":"Y","erase_all":"Y","long_run_image":"Y","long_run_video":"Y","data_transfer_test":"Y","dirty_fill_mode":"N","dirty_fill_loop_count":"1","image_test_count":"300","image_test_resolution":"","video_test_duration":"90","video_test_resolution":"","data_transfer_test_loop_count":"1","long_run_image_loop_count":"1","long_run_image_resolution":"","long_run_video_loop_count":"1","long_run_video_resolution":""}';
$updatedDataObject = json_decode($updatedData);
$configFile="CCATS_CONFIG copy.xml";
//echo "Yes OK";
// if(!file_exists($configFile))
// continue;
//echo "NO OK";
$dom=new DOMDocument();
$dom->load($configFile);
$root=$dom->documentElement;
$TestCases=$root->getElementsByTagName('TestCase');

for($iter=0;$iter<11;$iter++){

 $TestName=$TestCases->item($iter)->getElementsByTagName('TestName');
 $Execute=$TestCases->item($iter)->getElementsByTagName('Execute')->item(0);

 switch($TestName->item(0)->textContent){

    case "DirtyFill":

                      $Execute->nodeValue=$updatedDataObject->dirty_fill;
                      $TProperty=$TestCases->item($iter)->getElementsByTagName('TProperties')->item(0)->getElementsByTagName('TProperty');
                      $TProperty->item(0)->getElementsByTagName('Value')->nodeValue=$updatedDataObject->dirty_fill_mode;
                      $TProperty->item(1)->getElementsByTagName('Value')->nodeValue=$updatedDataObject->dirty_fill_loop_count;
                      //echo   $TProperty->item(1)->textContent;
    break;
    case "CapacityCheck":
                      $Execute->nodeValue=$updatedDataObject->capcity_check;
                      //echo "Here Ok";
    break;
    case "ImageTest":
                      //echo $iter."Here Ok";
                      $Execute->nodeValue=$updatedDataObject->image_test;

                      $TProperty=$TestCases->item($iter)->getElementsByTagName('TProperties')->item(0)->getElementsByTagName('TProperty');
                      //echo $TProperty->item(0)->getElementsByTagName('Value')->item(0)->textContent;
                      if($updatedDataObject->image_test_resolution!="")
                        $TProperty->item(0)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->image_test_resolution;
                      $TProperty->item(1)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->image_test_count;
    break;
    case "VideoTest":
                      $Execute->nodeValue=$updatedDataObject->video_test;
                      $TProperty=$TestCases->item($iter)->getElementsByTagName('TProperties')->item(0)->getElementsByTagName('TProperty');
                      if($updatedDataObject->video_test_resolution!="")
                        $TProperty->item(0)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->video_test_resolution;
                      $TProperty->item(1)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->video_test_duration;
    break;
    case "SleepWakeup":
    break;
    case "SequentialIO":
                      $Execute->nodeValue=$updatedDataObject->sequential_io_write;
    break;
    case "RandomIO":
                      $Execute->nodeValue=$updatedDataObject->random_io_write;
    break;
    case "EraseAll":
                      $Execute->nodeValue=$updatedDataObject->erase_all;
    break;
    case "LongRunImage":
                      $Execute->nodeValue=$updatedDataObject->long_run_image;
                      $TProperty=$TestCases->item($iter)->getElementsByTagName('TProperties')->item(0)->getElementsByTagName('TProperty');
                      if($updatedDataObject->long_run_image_resolution!="")
                        $TProperty->item(0)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->long_run_image_resolution;
                      $TProperty->item(1)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->long_run_image_loop_count;
    break;
    case "LongRunVideo":
                      $Execute->nodeValue=$updatedDataObject->long_run_video;
                      $TProperty=$TestCases->item($iter)->getElementsByTagName('TProperties')->item(0)->getElementsByTagName('TProperty');
                      if($updatedDataObject->long_run_video_resolution!="")
                        $TProperty->item(0)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->long_run_video_resolution;
                      $TProperty->item(1)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->long_run_video_loop_count;
    break;
    case "DataTransfer":
                      $Execute->nodeValue=$updatedDataObject->data_transfer_test;
                      $TProperty=$TestCases->item($iter)->getElementsByTagName('TProperties')->item(0)->getElementsByTagName('TProperty');
                      $TProperty->item(0)->getElementsByTagName('Value')->item(0)->nodeValue=$updatedDataObject->data_transfer_test_loop_count;
    break;
    default:
    break;

    }
} //iter
//echo $dom->save($configFile);
echo $dom->textContent;

?>