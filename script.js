const RANDOM_QUOTE_API_URL = 'http://api.quotable.io/random'
const quoteDisplayElement = document.getElementById('quoteDisplay')
const quoteInputElement = document.getElementById('quoteInput')

var len=0;
var mistakes=0;
function enableTextarea(){
  var textArea = document.getElementById('quoteInput');
  textArea.removeAttribute("disabled");
  textArea.focus();
  startTimer()
  document.getElementById('button').style.display='none';
}
function displayMistakes(){
  // Display alert with mistake count and time
  alert("total mistakes are: " + mistakes + "\n time is : " + sec + " sec");

  // Reset timer and mistake count
  //stopTimer();
  sec = 0; // Reset seconds
  mistakes = 0; // Reset mistakes count
  document.getElementById('mistakes').innerHTML = "Mistakes: " + mistakes;
  startTimer(); // Start the timer again

  // Render a new quote or perform any other necessary actions
  renderNewQuote();
  emptyTextArea();
  document.getElementById('button').style.display = 'block';
//  //stopTimer();
  
  
//   alert("total mistakes are: "+mistakes +"\n time is : "+ sec +"sec" )
//   document.getElementById('button').style.display='block';
//   renderNewQuote();
//   emptyTextArea();
//   startTimer()
//   mistakes=0;

}
quoteInputElement.addEventListener('input', () => {
  const arrayQuote = quoteDisplayElement.querySelectorAll('span')
  const arrayValue = quoteInputElement.value.split('')

  let correct = true
  arrayQuote.forEach((characterSpan, index) => {
    
    const character = arrayValue[index]
    if (character == null) {
      characterSpan.classList.remove('correct')
      characterSpan.classList.remove('incorrect')
      correct = false
    } else if (character === characterSpan.innerText) {
      characterSpan.classList.add('correct')
      characterSpan.classList.remove('incorrect')
    } /*else {
      characterSpan.classList.remove('correct')
      characterSpan.classList.add('incorrect')
      correct = false
      mistakes++;
      document.getElementById('mistakes').innerHTML="Mistakes :"+mistakes;
    }*/
    else if (!characterSpan.classList.contains('incorrect')) {
      characterSpan.classList.remove('correct')
      characterSpan.classList.add('incorrect')
      mistakes++; // Increment the mistake count by one for each new mistake
      document.getElementById('mistakes').innerHTML = "Mistakes: " + mistakes;
    }
    
  
  })
  
})
function emptyTextArea(){
  renderNewQuote();
  quoteInputElement.innerHTML='';
}
function getRandomQuote() {
  return fetch(RANDOM_QUOTE_API_URL)
    .then(response => response.json())
    .then(data => data.content)
}

async function renderNewQuote() {
  const quote = await getRandomQuote()
  quoteDisplayElement.innerHTML = ''
  quote.split('').forEach(character => {
    const characterSpan = document.createElement('span')
    characterSpan.innerText = character
    quoteDisplayElement.appendChild(characterSpan)
    len=quoteDisplayElement.length;
    
  })
  quoteInputElement.value = null
 // 
}
renderNewQuote()
//startTimer()
var timer;
var sec = 1;
var ele = document.getElementById('timer');

function startTimer() {
    // Check if the timer is already running
    if (timer) {
      return;
  }
    ele.innerHTML = '00:00'; // Initialize the display to '00:00'

    timer = setInterval(() => {
        // Format the seconds to display leading zeros for single-digit seconds
        var formattedSec = (sec < 10) ? '0' + sec : sec;
        ele.innerHTML = '00:' + formattedSec;
        sec++;
    }, 1000);
}

function stopTimer(){
  clearInterval(timer);
}

function handleFormSubmission() {
  
  // Use AJAX to send data to the server
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "typingindex.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from the server if needed
    }
  };
  // Send the form data to the server
  xhr.send("timer=" + sec + "&mistakes=" + mistakes);
  displayMistakes()
}























/*startTimer()
let startTime;
let timerInterval; // Store the interval ID

function startTimer() {
  timerElement.innerText = 0;
  startTime = new Date();
  timerInterval = setInterval(() => {
    timerElement.innerText = getTimerTime();
  }, 1000);
}

function stopTimer() {
  clearInterval(timerInterval); // Stop the timer by clearing the interval
}

function getTimerTime() {
  return Math.floor((new Date() - startTime) / 1000);
}*/
/*renderNewQuote()
// Example usage:
// Start the timer
console.log(document.getElementById('quoteDisplay').value);
//startTimer();
stopTimer();

// To stop the timer (call this when you want to stop it)
// stopTimer();*/
