var todoList = [];
var idList;
window.onload = function(){

    idList = document.getElementById("ft_list");
    var button = document.getElementById("new");
    var temp =  document.cookie.match(/newTodoList":(.+?)}/);
    if (temp != null){
        todoList = JSON.parse(temp[1]);
        for (let i = 0; i < todoList.length; i++)
            addToDo(todoList[i]);
        }
    button.onclick = function () {
        var text = prompt("Add new To Do");
        if (text != null && text !== ""){
            addToDo(text);
        }
    };

    function addToDo(text) {
        const div = document.createElement("div");
        div.innerHTML = text;
        div.addEventListener("click", deleteToDo);
        idList.insertBefore(div, idList.firstChild);
    }

    function deleteToDo() {
        if (confirm("Do you want delete this To Do ?"))
            this.remove();
    }

};

window.onunload = function () {
    var list = idList.children;
    var newTodoList = [];
    for (let i = 0; i < list.length ; i++)
        newTodoList.unshift(list[i].innerHTML);
    document.cookie = JSON.stringify({newTodoList});
};