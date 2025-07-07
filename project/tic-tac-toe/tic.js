const boxes = document.querySelectorAll(".box");
const resetBtn = document.querySelector("#reset-btn");
const newGameBtn = document.querySelector("#new-btn");
const msgContainer = document.querySelector(".msg-container");
const msg = document.querySelector("#msg");

let turnO = true;
const winPattern = [
  [0, 1, 2],
  [0, 3, 6],
  [0, 4, 8],
  [1, 4, 7],
  [2, 5, 8],
  [2, 4, 6],
  [3, 4, 5],
  [6, 7, 8],
];

const resetGame = () => {
  turnO = true;
  enableBoxes();
  msgContainer.classList.add("hide");
  updateStatus();
};

boxes.forEach((box) => {
  box.addEventListener("click", () => {
    if (turnO) {
      box.innerHTML = "O";
      turnO = false;
    } else {
      box.innerHTML = "X";
      turnO = true;
    }
    box.disabled = turnO;

    checkWinner();
    updateStatus();
  });
});

const enableBoxes = () => {
  for (let box of boxes) {
    box.disabled = false;
    box.innerHTML = "";
  }
};
const disableBoxes = () => {
  for (let box of boxes) {
    box.disabled = true;
  }
};
const showWinner = (winner) => {
  msg.innerHTML = `Congratulation, Winner is ${winner}`;
  msgContainer.classList.remove("hide");
  disableBoxes();
};

const checkDraw = () => {
  const allFilled = [...boxes].every((box) => box.innerHTML !== "");
  if (allFilled) {
    msg.innerHTML = "It's a draw!";
    msgContainer.classList.remove("hide");
    disableBoxes();
  }
};

const checkWinner = () => {
  let winnerFound = false;
  for (let pattern of winPattern) {
    let pos1Val = boxes[pattern[0]].innerHTML;
    let pos2Val = boxes[pattern[1]].innerHTML;
    let pos3Val = boxes[pattern[2]].innerHTML;

    if (pos1Val != "" && pos2Val != "" && pos3Val != "") {
      if (pos1Val === pos2Val && pos2Val === pos3Val) {
        showWinner(pos1Val);
        winnerFound = true;
        break;
      }
    }
    if (!winnerFound) {
      checkDraw();
    }
  }
};

const statusMsg = document.querySelector("#status-msg");

const updateStatus = () => {
  statusMsg.innerHTML = turnO ? "O's Turn" : "X's Turn";
};

// Call updateStatus() after each move and on game reset

newGameBtn.addEventListener("click", resetGame);
resetBtn.addEventListener("click", resetGame);
