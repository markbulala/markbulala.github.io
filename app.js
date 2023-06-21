
var words = ["CAT", "DOG", "BIRD"];
var hints = {
  "CAT": "A small domesticated carnivorous mammal with soft fur.",
  "DOG": "A domesticated carnivorous mammal that typically has a long snout, an acute sense of smell, and a barking, howling, or whining voice.",
  "BIRD": "A warm-blooded egg-laying vertebrate animal with feathers, a beak, and wings."
};

var randomWord = getRandomWord(words);
var hintElement = document.getElementById("hint");
hintElement.textContent = "Hint: " + hints[randomWord];
var keyboardContainer = document.querySelector("#keyboard-container");
var snowmanParts = [
  ".hat",
  ".face",
  ".scarf",
  "hands",
  ".body-top",
  ".body-middle",
  ".body-bottom",
];

keyboardContainer.addEventListener("click", handleKeyboardClick);

generateHiddenWord(randomWord);

function checkForMatch(clickedLetter) {
  var hiddenLetterElements = document.querySelectorAll(".hidden");
  var hasMatch = false;

  for (var hiddenLetterElement of hiddenLetterElements) {
    var hiddenLetter = hiddenLetterElement.textContent;
    if (hiddenLetter === clickedLetter) {
      hiddenLetterElement.classList.remove("hidden");
      hasMatch = true;
    }
  }

  return hasMatch;
}

function checkForLoser() {
  if (snowmanParts.length === 0) {
    document.querySelector("#snowman-container").innerHTML = "<h2>You lost, game over!</h2>";
    keyboardContainer.innerHTML = `<h2>The word was: ${randomWord}</h2>`;
  }
}

function checkForWinner() {
  var hiddenLetterElements = document.querySelectorAll(".hidden");
  if (hiddenLetterElements.length === 0) {
    keyboardContainer.innerHTML = "<h2>You win!</h2>";
  }
}

function handleKeyboardClick(event) {
  var clickedElement = event.target;

  if (!clickedElement.classList.contains("letter") || clickedElement.classList.contains("selected")) return;

  clickedElement.classList.add("selected");

  var clickedLetter = clickedElement.textContent;
  var hasMatch = checkForMatch(clickedLetter);

  if (!hasMatch) {
    removeSnowmanPart();
    checkForLoser();
  } else {
    checkForWinner();
  }
}

function generateHiddenWord(word) {
  var letters = word.split("");
  var emptyLetterContainer = document.querySelector("#empty-letter-container");

  var lettersHTML = "";
  for (var letter of letters) {
    var letterHTML = `<p class="letter-container"><span class="letter hidden">${letter}</span></p>`;
    lettersHTML += letterHTML;
  }

  emptyLetterContainer.innerHTML = lettersHTML;
}

function getRandomWord(words) {
  var randomIndex = Math.floor(Math.random() * words.length);
  var randomWord = words[randomIndex];
  return randomWord;
}

function removeSnowmanPart() {
  var snowmanPart = snowmanParts.shift();
  var partsToRemove = document.querySelectorAll(snowmanPart);

  for (var partToRemove of partsToRemove) {
    partToRemove.remove();
  }
}
