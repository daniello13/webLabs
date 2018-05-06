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
        draw: function(progress) {
            logo_img.style.bottom = progress * -57 + 'px';
        }
    });
};


// var msgID, inpID;
// function SubmitForm(){
//   var flag = true;
//   var regularexp = /^[a-zA-Z]{2,64}$/;
//   var name = document.getElementById("name");
//   var surname = document.getElementById("surname");
//   var secondname = document.getElementById("seсondname");
//   var age = document.getElementById("age");
//   var about = document.getElementById("about");
//   if(!(regularexp.test(name.value)))
//   {
//   	flag = false;
//     showformerror("resName", "name", "Проверте правильность ввода Имени", false);
//   }
//   else{
//     showformerror("resName", "name", "Данные об имени введены верно", true);
//   }
//   if(!(regularexp.test(surname.value)))
//   {
//   	flag = false;
//     showformerror("resSur", "surname", "Проверте правильность ввода Фамилии", false);
//   }
//   else{
//     showformerror("resSur", "surname", "Данные об имени введены верно", true);
//   }
//   if(!(regularexp.test(seсondname.value)))
//   {
//     flag = false;
//     showformerror("resSec", "seсondname", "Проверте правильность ввода Отчества", false);
//   }
//   else{
//     showformerror("resSec", "seсondname", "Данные об имени введены верно", true);
//   }
//   var Age = age.options[age.selectedIndex].value; 
//   if (flag) {
//     alert("Name:  " + name.value + "\nSurname:  " + surname.value + "\nSecond name:  " + seсondname.value + "\nAge:  " + age.value + "\nAbout:  " + about.value)
//     return flag;
//   }
//   else {
//     return flag;
//   }
// }
//   function showformerror(msgID, inpID, message, correct) {
//     document.getElementById(msgID).innerText = message;
//     if (correct) {
//       document.getElementById(inpID).style.border = "2px solid #7FFF00";
//     }
//     else {
//       document.getElementById(inpID).style.border = "2px solid #FF0000";
//     }
//   }

window.onload = simpleAnimationLOGO;