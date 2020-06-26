var todoList = [];
var idList;
$(document).ready(function () {
    idList = $("#ft_list");
    var button = $("#new");
    var temp =  document.cookie.match(/newTodoList":(.+?)}/);
    if (temp != null){
        todoList = JSON.parse(temp[1]);
        for (let i = 0; i < todoList.length; i++)
            addToDo(todoList[i]);
    }
    button.click(function () {
        var text = prompt("Add new To Do");
        if (text != null && text !== ""){
            addToDo(text);
        }

    });

    function addToDo(text) {
        const div = $("<div></div>").text(text);
        $(div).on("click", deleteToDo);
        idList.prepend(div);
    }

    function deleteToDo() {
        if (confirm("Do you want delete this To Do ?"))
            this.remove();
    }

});

window.onunload=function () {
    var list = idList.children();
    var newTodoList = [];
    for (let i = 0; i < list.length ; i++)
        newTodoList.unshift(list[i].innerHTML);
    document.cookie = JSON.stringify({newTodoList});

};