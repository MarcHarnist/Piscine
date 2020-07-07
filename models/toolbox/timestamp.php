<?php

//        Timestamp -> date.

  echo "<h3>The timestamp : time()</h3>";
  echo "<hr />"; // -> ___________________________ 
  echo "1. time() = ".time()."<br />";  // -> 1. time() = 1502627434
  echo "<hr />"; // -> ___________________________ 
  $timestamp_mauze = time() + 7200; // + 2h
  echo "2. Timestamp of Mauzé: " . $timestamp_mauze; // -> 2. Timestamp of Mauzé: 1502634634
  echo "<hr />"; // -> ___________________________ 
 
?>