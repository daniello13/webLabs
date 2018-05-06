/*$(document).ready(function() {
    $.ajax({
        type: "GET",
        url: dom + "generator.php",
        dataType: "json",
        success: function(graphData) {
            getCanvas('canvas', graphData);
        }
    });
});*/
document.addEventListener('DOMContentLoaded', function(){ // Аналог $(document).ready(function(){
 
    var xmlhttp = new XMLHttpRequest();

	xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var message = JSON.parse(xmlhttp.responseText);
       
            getCanvas('canvas', message);
            
        }
    }
    xmlhttp.open("GET", dom+"generator1.php", true);
    xmlhttp.send();
});

function getCanvas(canvID, graphData) {
    var canvas = document.getElementById(canvID);
    canvas.width = canvas.offsetWidth;
    canvas.height = canvas.offsetHeight;
    var context = canvas.getContext('2d');
    for (var i = 0; i < graphData.length; i++) {
        if (graphData[i] < 0) {
            CanvError('Error: Array has negative numbers!', context, canvas.width, canvas.height);
            return;
        }
    }
    Draw(context, canvas.width, canvas.height, graphData);
}

function CanvError(error, context, width, height) {
    context.font = 'bold 19px Arial';
    context.textAlign = 'center';
    context.fillStyle = '#ff0000';
    context.fillText(error, width / 2, height / 2);
}


function Draw(cont, canv_width, canv_height, graphData) {
    var offset = 15;
    var max = Math.trunc(Math.max.apply(null, graphData));
    var step = max / 10;
    max += step;
    var foo = (canv_width - 3 * offset) / graphData.length;

    /*Start grid */
    cont.strokeStyle = '#7f7f7f';
    cont.linecanv_width = 2;
    cont.beginPath();
    cont.moveTo(offset * 2, offset);
    cont.lineTo(offset * 2, canv_height - offset);
    cont.lineTo(canv_width - offset, canv_height - offset);
    cont.stroke();

    cont.linecanv_width = 1;
    cont.strokeStyle = '#f4f4f4';
    cont.font = 'bold 13px Arial';
    cont.textAlign = 'right';
    for (var i = step; i < max; i += step) {
        cont.beginPath();
        cont.moveTo(offset * 2, i * (canv_height - offset) / max);
        cont.lineTo(canv_width - offset, i * (canv_height - offset) / max);
        cont.stroke();

        cont.fillText(max - i, offset * 2 - 5, i * (canv_height - offset) / max);
    }
    /*End grid */

    /*Start draw graph */
    cont.strokeStyle = '#9e1a48';
    cont.lineWidth = 2;
    cont.beginPath();
    cont.moveTo(offset * 2 + foo / 2, canv_height - offset - graphData[0] / max * (canv_height - offset));
    for (var i = 1; i < graphData.length; i++) {
        cont.lineTo(offset * 2 + i * foo + foo / 2, canv_height - offset - graphData[i] / max * (canv_height - offset));
    }
    cont.stroke();

    cont.font = 'bold 12px Arial';
    cont.textAlign = 'center';
    cont.textBaseline = 'bottom';
    for (var i = 0; i < graphData.length; i++) {
        cont.fillStyle = '#c99700';
        cont.beginPath();
        cont.arc(offset * 2 + i * foo + foo / 2, canv_height - offset - graphData[i] / max * (canv_height - offset), 5, 0, Math.PI * 2, true);
        cont.fill();
        cont.fillStyle = '#000000';
        cont.fillText(graphData[i], offset * 2 + i * foo + foo / 2, canv_height - offset - graphData[i] / max * (canv_height - offset) - 5);
    }
    /*End draw graph*/
}