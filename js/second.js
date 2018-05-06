var a = document.getElementById("logo_img");

function animate({
    timing,
    draw,
    duration
}) {

    let start = performance.now();

    requestAnimationFrame(function animate(time) {
        // timeFraction goes from 0 to 1
        let timeFraction = (time - start) / duration;
        if (timeFraction > 1) timeFraction = 1;

        // calculate the current animation state
        let progress = timing(timeFraction);

        draw(progress); // draw it

        if (timeFraction < 1) {
            requestAnimationFrame(animate);
        }

    });
}

function simpleAnimationLOGO(a) {
    animate({
        duration: 1000,
        timing: function circ(timeFraction) {
            return Math.pow(timeFraction, 2);
        },
        draw: function (progress) {
            logo_img.style.bottom = progress * -57 + 'px';
        }
    });
};

function reload() {
    setTimeout('window.location.href="index.php"', 4000);
}

function timerToreload() {
    var error = document.getElementById("error");
    i = 3;
    var set = setInterval(
        function () {
            error.innerText = "Данная страница недоступна, перенаправление на главную странц произойдет через: " + i;
            i--;
            setTimeout('clearInterval(set)', 3000)
        }, 1000
    )
}

function load() {
    timerToreload();
    reload();
    simpleAnimationLOGO();
}
window.onload = load;
