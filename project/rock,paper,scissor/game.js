let userScore = 0;
let compScore = 0;

const choices = document.querySelectorAll(".choice");
const msg = document.querySelector("#msg");
const body = document.querySelector("body");
const userScorePara = document.querySelector("#user-score");
const compScorePara = document.querySelector("#comp-score");

const genCompChoice = () => {
    let options = ["rock" , "paper" , "scissors"];
    const randomIdx = Math.floor(Math.random()*3);
    return options[randomIdx];
};
    const drawGame = () => {
        console.log("Game was draw.");
        msg.innerText = "Game draw, Try again !"
        msg.style.backgroundColor = "#081b31";
        // body.style.backgroundColor = "#081b3";
    };
    const showWinner = (userWin) =>{
        if(userWin) {
            userScore++;
            userScorePara.innerText = userScore;
            // console.log("you win ");
             msg.innerText = "you win ";
            msg.style.backgroundColor = "green";
            // body.style.backgroundColor = "green"
        }
        else{
            compScore++;
            compScorePara.innerText = compScore;   
            console.log("you lose");
            msg.innerText = "you lose";
            msg.style.backgroundColor = "red";
            // body.style.backgroundColor = "red";
        }
    };


const playGame = (userChoice) => {
    console.log("user choice =" , userChoice);
    const compChoice = genCompChoice();
    console.log("comp choice =" , compChoice);

    if(userChoice === compChoice){
        // draw game
        drawGame();
    }
    else{
        let userWin = true;
        if(userChoice === "rock"){
            //scissor, paper
           userWin =  compChoice === "paper" ? false : true;
        }
        else if(userChoice=== "paper"){
            // rock , scissors
            userWin = compChoice === "scissors" ? false : true;
        }
        else{
            // rock , paper
           userWin = compChoice === "rock" ? false : true;
        }
        showWinner(userWin);
    }
};

choices.forEach((choice) => {
    // console.log(choice);
    choice.addEventListener("click",()=>{
        const userChoice = choice.getAttribute("id");
        // console.log("choice was clicked",userChoice);
        playGame(userChoice);
    });
});