const button = document.getElementById("button");

button.addEventListener("click", function (event) {
  event.preventDefault(); // Fix: use event.preventDefault()
  const lengthSlider = document.getElementById("length");
  const lengthDisplay = document.getElementById("lengthDisplay");

  lengthSlider.addEventListener("input", () => {
    lengthDisplay.textContent = lengthSlider.value;
  });

  const Password = document.getElementById("Password");
  const length = parseInt(lengthSlider.value);

  const includeUppercase = document.getElementById("uppercase").checked;
  const includeLowercase = document.getElementById("lowercase").checked;
  const includeNumbers = document.getElementById("numbers").checked;
  const includeSymbols = document.getElementById("symbols").checked;

  const uppercaseChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  const lowercaseChars = "abcdefghijklmnopqrstuvwxyz";
  const numberChars = "0123456789";
  const symbolChars = "!@#$%^&*()_+[]{}|;:,.<>?";

  let charPool = "";
  if (includeUppercase) charPool += uppercaseChars;
  if (includeLowercase) charPool += lowercaseChars;
  if (includeNumbers) charPool += numberChars;
  if (includeSymbols) charPool += symbolChars;

  if (charPool === "") {
    alert("Please select at least one character type.");
    return;
  }

  let password = "";
  for (let i = 0; i < length; i++) {
    password += charPool.charAt(Math.floor(Math.random() * charPool.length));
  }

  Password.value = password; 
});
