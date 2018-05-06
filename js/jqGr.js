$(document).ready(function() {
    var i;
    var canvas = document.getElementById("draw");
    var x = canvas.getContext("2d");
    $.ajax({
        type: "POST",
        url: "generator.php",
        dataType: "text",
        success: function(data) {
            var arr = $.parseJSON(data);
            var max = Math.max.apply(null, arr);
            var startX = 50;
            var startY = 450;
            var ElementsWidth = (startY + 50 - startX) / arr.length;
            var maxH = 400;
            var curW = ElementsWidth * 3 / 4;
            var curH;
            x.beginPath();
            x.strokeStyle = "#000000";
            x.moveTo(30, 451);
            x.lineTo(530, 451);
            x.moveTo(30, 10);
            x.lineTo(30, 451);
            x.stroke();
            x.closePath();
            var koef = 1;
            var step = 15;
            x.font = "12px Arial";
            x.beginPath();
            x.strokeStyle = "#808080";
            for (i = 0; i < (arr.length); i = i + 2) {
                if (i == 0) {
                    x.moveTo(arr[i] + 200, 0);
                    x.lineTo(arr[i] + 200, 520);
                    x.fillText(Math.round(arr[i]), arr[i] + 200, 470);
                    x.stroke();
                    x.moveTo(0, arr[i + 1] + 30);
                    x.lineTo(520, arr[i + 1] + 30);
                    x.fillText(Math.round(arr[i + 1]), 5, arr[i + 1] + 30);
                    x.stroke();
                } else {
                    x.moveTo(arr[i] + 20 * koef, 0);
                    x.lineTo(arr[i] + 20 * koef, 520);
                    x.fillText(Math.round(arr[i]), arr[i] + 20 * koef, 470);
                    x.stroke();
                    x.moveTo(0, arr[i + 1] + 30);
                    x.lineTo(520, arr[i + 1] + 30);
                    x.fillText(Math.round(arr[i + 1]), 5, arr[i + 1] + 30);
                    x.stroke();
                }

                koef += 2.5;
                // x.moveTo(arr[i] + 50, 0);
                // x.lineTo(arr[i] + 50, 520);
                // x.fillText(Math.round(arr[i]), arr[i] + 50, 470);
                // x.moveTo(0, arr[i + 1] + 50);
                // x.lineTo(520, arr[i + 1] + 50);
                ////  x.fillText(Math.round(arr[i + 1]), 5, arr[i + 1] + 50);
                // x.moveTo(22, i * 50 + 50.5);
                // x.lineTo(520, i * 50 + 50.5);
                // x.fillText(Math.round(max * koef), 5, i * 51 + 50.5);
                // x.stroke();
                // x.moveTo(i * 50 + 50.5, 22);
                // x.lineTo(i * 50 + 50.5, 470);
                // x.fillText(Math.round(max * koef), i * 51 + 50.5, 480);
                // x.stroke();
                // koef -= 0.125;
            }
            x.stroke();
            x.closePath();
            // for (i = 0; i < arr.length; i++) {
            //     var r = Math.round(Math.random() * 255);
            //     var g = Math.round(Math.random() * 255);
            //     var b = Math.round(Math.random() * 255);
            //     if (r > 200 && g > 200 && b > 200) {
            //         r -= 50;
            //         g -= 50;
            //         b -= 50;
            //     }
            //     x.fillStyle = "rgb(" + r + "," + g + "," + b + ")";
            //     curH = maxH * (0 - arr[i]) / max;
            //     x.fillRect(startX + i * ElementsWidth, startY, curW, curH);
            //     x.fillStyle = "black";
            //     x.fillText(i + 1, startX + i * ElementsWidth + ElementsWidth / 4, startY + 20);
            // }
        }
    });
});