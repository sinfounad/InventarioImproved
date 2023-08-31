<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<h2>Hola mundo!!</h2>
<script>


   
let existe;
var lastName='saouth park';

existe="No me la monte no me la monta nanana soy importante en  la sociedad";
console.log('Que mierda es esto');
console.log(typeof existe);  // <- variable declarada
console.log(typeof exists);  // <- variable no declarada
console.log(existe);

//sessionStorage.removeItem(Apellidos);
console.log(localStorage.Apellido);




console.log('Super  stars');


console.log(localStorage.lastname);
console.log(localStorage.lastname);
sessionStorage.setItem("key", "value");
console.log( sessionStorage.getItem("key"));

let lastname = sessionStorage.getItem("key");
console.log(sessionStorage.getItem("key"));
console.log( localStorage.getItem("lastname"));
if(!localStorage.getItem("Done")){
    localStorage.setItem("Done", "OK")
    console.log('lo haras una sola vez');
}

setTimeout(() => {
localStorage.setItem("Done", "OK");
window.location.href = "tres.php";
}, "7000");
</script>
</body>
</html>