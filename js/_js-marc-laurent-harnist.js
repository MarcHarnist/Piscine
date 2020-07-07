var counterElement = document.getElementById("counter");

// Count down the counter until 0
function decreaseCounter() {
	// Convert counter text to a number
	// Converti le contenu de l'élément html déterminé par l'id "counter" en un nombre
    var counter = Number(counterElement.textContent);
    counterElement.textContent = counter - 1;
	if(counter == 1){
		alert('BOUM!')//ouvre une fenêtre avec le message "BOUM!"
		document.body.innerHTML = ""; // ce code va effacer le body soit toute la page
	}
}

// Call the decreaseCounter function every second (1000 milliseconds)
setInterval(decreaseCounter, 1000);