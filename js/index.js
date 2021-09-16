//Author:         Neil-Bryan Caoile
//Student Number: 991590424
//April 15 2021

var inputText = document.querySelectorAll("input");
var errorMsg = document.querySelectorAll(".error-message1");
var icon = document.querySelectorAll(".cancel-icon");
var button = inputText[2];

var isName = false;
var isPrice = false;

// This function display images when select button is used
var isSelected = false;
function displayImage() {
  var selectedValue = document.getElementById("swordType").selectedOptions[0]
    .value;
  var img = document.getElementById("swordTypeImg");

  if (selectedValue == "longSword") {
    isSelected = true;
    img.setAttribute("src", "images/longSword.gif");
  } else if (selectedValue == "shortSword") {
    isSelected = true;
    img.setAttribute("src", "images/shortSword.gif");
  } else {
    isSelected = false;
    img.setAttribute(
      "src",
      "https://static.vecteezy.com/system/resources/thumbnails/001/202/766/small/sword.png"
    );
  }
}

// Input check for addSword

function showError(icon, errorMsg) {
  icon.setAttribute("src", "images/cancel.png");
  icon.classList.add("visible");
  icon.classList.remove("not-visible");
}
function isAcepted(icon, errorMsg) {
  icon.setAttribute("src", "images/check-mark.png");
  icon.classList.add("visible");
  icon.classList.remove("not-visible");
}
// Swords Name Validation
inputText[0].addEventListener("keyup", function () {
  isName = true;
  errorMsg[1].innerHTML = " ";
});

button.addEventListener("click", function () {
  if (inputText[0].value.length == 0) {
    isName = false;
  }
});

inputText[1].addEventListener("keyup", function () {
  errorMsg[1].innerHTML = " ";
  var priceInput = inputText[1].value;
  for (var i = 0; i < priceInput.length; i++) {
    if (
      priceInput[i] == "0" ||
      priceInput[i] == "1" ||
      priceInput[i] == "2" ||
      priceInput[i] == "3" ||
      priceInput[i] == "4" ||
      priceInput[i] == "5" ||
      priceInput[i] == "6" ||
      priceInput[i] == "7" ||
      priceInput[i] == "8" ||
      priceInput[i] == "9"
    ) {
      isPrice = true;
      var isPriceNumber = true;
      isAcepted(icon[0], errorMsg[1]);
    } else {
      var isPriceNumber = false;
    }
  }

  if (priceInput.length == 0) {
    isPrice = false;
    icon[0].classList.add("not-visible");
  } else {
    if (!isPriceNumber) {
      showError(icon[0], errorMsg[1]);
    }
  }
});

function validation() {
  if (isName && isPrice && isSelected) {
    return true;
  } else {
    if (!isPrice && !isName && !isSelected) {
      errorMsg[0].innerHTML = "Please select a sword type";
      errorMsg[1].innerHTML = "Sword name required";
      errorMsg[2].innerHTML = "Price required";
    } else if (!isName) {
      errorMsg[1].innerHTML = "Sword name required";
    } else if (!isPrice) {
      errorMsg[2].innerHTML = "Price required";
    } else if (!isSelected) {
      errorMsg[0].innerHTML = "Please select a sword type";
    }
    return false;
  }
}
