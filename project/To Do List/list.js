window.onload = function(){
    const inputBox = document.getElementById("input-task");
    const addBtn = document.getElementById("addbtn");
    const todolist = document.getElementById("todolist");
    
    let editTodo = null;

    const addtodo = () => {
        const inputText = inputBox.value.trim();  
        if(inputText.length <= 0){
            alert("You must add something!");
            return; 
        }

        if(addBtn.value === "Edit"){
            editTodo.previousElementSibling.innerHTML = inputText;
            addBtn.value = 'Add';
            inputBox.value = "";
            editTodo = null;
            return;
        }

        const li = document.createElement("li");
        const p = document.createElement("p");
        p.innerHTML = inputText;
        li.appendChild(p);

        const editBtn = document.createElement("button");
        editBtn.innerHTML = "EDIT";
        editBtn.classList.add("editBtn");
        li.appendChild(editBtn);

        const deleteBtn = document.createElement("button");
        deleteBtn.innerHTML = "REMOVE";
        deleteBtn.classList.add("deleteBtn");
        li.appendChild(deleteBtn);

        todolist.appendChild(li);
        inputBox.value = ""; 
    }

    const updateTodo = (e) => {
        if(e.target.innerHTML === "REMOVE"){
            todolist.removeChild(e.target.parentElement);
        }
        if(e.target.innerHTML === "EDIT"){
            inputBox.value = e.target.previousElementSibling.innerHTML;
            addBtn.value = "Edit";
            inputBox.focus();
            editTodo = e.target;  
        }
    }

    addBtn.addEventListener("click", addtodo);
    todolist.addEventListener("click", updateTodo);
};
