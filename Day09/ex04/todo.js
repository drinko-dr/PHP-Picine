$(document).ready(function () {
    if ( $("#ft_list").children().length === 0 ){
        const img = $("<img width='500px' height='40%'>");
        $(img).attr("src", "https://i.pinimg.com/originals/78/e8/26/78e826ca1b9351214dfdd5e47f7e2024.gif");
        $(img).attr("id", "loading");
        $("#ft_list").prepend(img);
    }
    setInterval( () => sync( ajaxSelect() ), 2000);
    var button = $("#new");
    button.click(function () {
        var text = prompt("Add new To Do");
        if (text != null && text !== ""){
            addToDo(text, true);
        }

    });

    var last_id = 0;

    function addToDo(text, isSave) {
        const div = $("<div></div>").text(text);
        $(div).on("click", deleteToDo);
        if (isSave === true){
            last_id++;
            ajaxSave(text);
        }
        $(div).attr('id', last_id);
        $("#ft_list").prepend(div);
    }

    function deleteToDo() {
        if (confirm("Do you want delete this To Do ?")){
            ajaxDelete(this.id);
            this.remove();
        }
    }

    function ajaxSave(list) {
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: "list=" + list+"&id=" + last_id,
                async: true,
            });
    }

    function ajaxSelect() {
        var response = '';
        $.ajax({
            type: "POST",
            url: "select.php",
            data: "select=true",
            async: false,
            success: function(msg){
                response = msg;
            }
        });
        return response;
    }

    function ajaxDelete(id) {
        $.ajax({
            type: "POST",
            url: "delete.php",
            data: "id=" + id,
            async: false,
        });
    }


    function parser(file){
        var array = [];
        file = file.split("\n");

        for (let i = 0; i < file.length ; i++) {
                array.push(file[i].split(";"));
        }

        return array;
    }

    function sync (csv) {
        csv = parser(csv);
        console.log(csv);
        $("#loading").remove();
        if ( $("#ft_list").children().length === 0 || $("#ft_list").children().length !== csv.length - 1  ) {
            $("#ft_list").children().remove();
            for (let i = 0; i < csv.length - 1; i++){
                last_id = csv[i][0];
                addToDo(csv[i][1], false);
            }
        }
    }

});
