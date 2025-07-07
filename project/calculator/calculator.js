const screen = document.getElementById("screen");
let currentInput = "";
let operator = "";
let firstOperand = "";

document.querySelectorAll("button").forEach((button) =>{
    button.addEventListener("click" , ()=>{
        const value = button.innerText;

        if(!isNaN(value) || value === "."){
            // append numbers and dots to the current input
            currentInput += value;
            screen.innerText = currentInput;
        }else if(value === "AC"){
            // clear everything
            currentInput = "";
            operator = "null";
            firstOperand = "null";
            screen.innerText = "0";
        }
        else if (value === "DEL") {
            // Remove the last character from currentInput
            currentInput = currentInput.slice(0, -1);
          
            // Check if currentInput is empty
            if (currentInput === "") {
              screen.innerText = "0"; // Reset to 0 if input is empty
            } else {
              screen.innerText = currentInput; // Display the remaining input
            }
          }
          
        else if (value === "="){
            // perform the calculation
            if (firstOperand !== null && operator !== null){
                const secondOperand = parseFloat(currentInput);
                let result;
                switch (operator){
                    case "+":
                        result = firstOperand + secondOperand ;
                        break;
                    case "-":
                        result = firstOperand - secondOperand ;
                        break ;
                    case "*":
                        result = firstOperand * secondOperand ;
                        break;
                    case "/":
                        result = firstOperand / secondOperand ;
                        break ;
                    case "%":
                        result = firstOperand % secondOperand ;
                        break;
                    case "√":
                        result = Math.sqrt(firstOperand);
                        break ;
                    default:
                        break;
                }
                screen.innerText = result;
                currentInput = "";
                operator = null;
                firstOperand = null;
              }
            } else {
              // Handle operators
              if (currentInput) {
                firstOperand = parseFloat(currentInput);
                operator = value;
                currentInput = "";

            }
        }
    })
})