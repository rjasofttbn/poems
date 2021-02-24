
<!-- this code for hit count in home page start !-->

<?php

/**
 * Create an empty text file called counter.txt and 
 * upload to the same directory as the page you want to 
 * count hits for.
 * 
 * Add this line of code on your page:
 * <?php include "hit.php"; ?>
 */

$filename="counter.txt";
// Open the file for reading
$fp = fopen($filename, 'r');

// Get the existing count
$count = fread($fp, filesize($filename));

// Close the file
fclose($fp);

// Add 1 to the existing count
$count = $count + 1;

// Display the number of hits
// If you don't want to display it, comment out this line
echo "<p>Total Hits : " . $count . "</p>";

// Reopen the file and erase the contents
$fp = fopen($filename, 'w');

// Write the new count to the file
fwrite($fp, $count);

// Close the file
fclose($fp);

?> 

<!-- this code for hit count in home page end !-->