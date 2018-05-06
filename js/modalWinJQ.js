function showDesc(param1, param2) {
    $('#description').addClass("displayBlock");
    $('#shadow').addClass("displayShadow");

    $.ajax({
        type: "GET",
        url: dom + "showdescription.php",
        data: { iid: param1, sernum: param2 },
        dataType: "json",
        success: function(message) {
            if (ObjSize(message) > 0) {
                $('#img').attr('src', message['image']);
                $('#pop-up-name').text(message["name"]);
                $('#pop-up-desc').text(message["description"]);
                for (var key in message["params"]) {
                    CreateSpan("info-text", message["params"][key].value + ';', document.getElementById("pop-up-params"));
                }
            }
        },
        error: function() {
            CloseWin();
        }
    });

}

function CreateSpan(Class, SText, parent) {
    Span = document.createElement('span');
    $(Span).addClass(Class)
        .text(SText)
        .appendTo($(parent))
}

function DeleteSpan(parent) {
    $(parent).empty();
}

function ObjSize(obj) {
    var size = 0,
        key;
    for (key in obj) {
        if (obj.hasOwnProperty(key)) size++;
    }
    return size;
}

function CloseWin() {
    $('#description').removeClass("displayBlock");
    $('#shadow').removeClass("displayShadow");
    $('#img').attr('src', ' ');
    $("#pop-up-name").text("");
    $("#pop-up-desc").text("");
    DeleteSpan($("#pop-up-params"));
}