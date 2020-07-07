        <h3>Timestamp -> date.</h3>
<?php

  $timestamp_mauze = time() + 7200; // + 2h
  echo "1. Timestamp of Mauzé: " . $timestamp_mauze; // ->1. Timestamp of Mauzé: 1502634733
  echo "<hr />"; // -> ___________________________ 

  echo "2. " . date("d/m/Y", time()); // ->13/08/2017   
  echo "<hr />"; // -> ___________________________ 
  echo "3. " . date( "H:i", $timestamp_mauze ); // ->  14:04
  echo "<hr />"; // -> ___________________________ 
  echo "4. " . date( "d/m/Y", $timestamp_mauze ) . ' à ' . date( "H:i", $timestamp_mauze );  // -> 13/08/2017 à 14:11
  echo "<hr />"; // -> ___________________________ 
  echo "5. " . date("d/m/Y", 1502624881); // -> 13/08/2017
  echo "<hr />"; // -> ___________________________ 
		$one_hour = 60 * 60;  // 2 heures
		$one_day = $one_hour * 24; // 24 heures
		$one_year = $one_day * 365.25;
		$test = 100*$one_year;
		$timestamp=time();
		$timestamp=$timestamp-$test;
		$date= date("d/m/Y", $timestamp);
		echo "8. $date"; // -> 8. 13/08/1917
  echo "<hr />"; // -> ___________________________ 
  
