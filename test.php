<?php

$targetfolder = "documents/";

  $targetfolder = $targetfolder . basename( $_FILES['resume']['name']) ;

echo $targetfolder;

?>
<a href="./documents/keshav_resume.pdf" download>Download file </a>