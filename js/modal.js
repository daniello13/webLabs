function showDesc(param1, param2) {
    var winw = document.getElementById('description');
    var shadow = document.getElementById('shadow');
    winw.classList.add("displayBlock");
    shadow.classList.add("displayShadow");

    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else {
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var message = JSON.parse(xmlhttp.responseText);
            if (ObjSize(message) > 0) {
                var img = document.getElementById("img");
                img.setAttribute('src', message['image']);
                document.getElementById("pop-up-name").innerHTML = message['name'];
                document.getElementById("pop-up-desc").innerHTML = message['description'];
                for (var key in message["params"]) {
                    CreateSpan("info-text", message["params"][key].value + ';', document.getElementById("pop-up-params"));
                }
            } else {
                CloseWin();
            }
        }
    }
    xmlhttp.open("GET", "/lab7v2/showdescription.php?iid=" + param1 + "&sernum=" + param2, true);
    xmlhttp.send();
}

function CreateSpan(Class, SText, parent) {
    var Span = document.createElement('span');
    Span.className = Class;
    Span.innerHTML = SText;
    parent.appendChild(Span);
}

function DeleteSpan(parent) {
    while (parent.childElementCount > 0) {
        parent.removeChild(parent.lastChild);
    }
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
    var winw = document.getElementById('description');
    winw.classList.remove("displayBlock");
    shadow.classList.remove("displayShadow");
    img.setAttribute('src', '');
    document.getElementById("pop-up-name").innerHTML = "";
    document.getElementById("pop-up-desc").innerHTML = "";
    DeleteSpan(document.getElementById("pop-up-params"));
}