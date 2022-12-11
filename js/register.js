var p = document.getElementById('psw');
var p2 = document.getElementById('psw2');
var submit = document.getElementById('submit');

submit.addEventListener('click', async () => {

    var form = document.querySelector("#form");

    if(p.value == p2.value){
    
    //se il form è valido richiamo le API
        if (form.checkValidity()) {
            
            var formData = new FormData(form);

            await fetch('../php/register.php',
                { method: 'POST', body: formData }
            )
            .then(response => response.text())
            .then(success => {

                if (success.trim() == "ok") {
                    window.location.href='../php/login.php';
                }
                else if(success.trim() == "error"){
                    var error=document.createElement('p');
                    error.innerHTML = 'Esiste già un account con questa mail, fai il login!';
                    error.style.color= 'red';
                    error.style.cursor='pointer';
                    error.style.textDecoration="underline";
                    error.addEventListener('click', ()=>window.location.href="../php/loginInterface.php");
                    button.insertAdjacentElement('beforebegin',error);
                }
            });

            form.reset();
        }
        else{
            
            form.reportValidity();
        }
    }
    else{
        var error=document.createElement('p');
                    error.innerHTML = 'La password non è ripetuta correttamente!';
                    error.style.color= 'red';
                    error.style.cursor='pointer';
                    error.style.textDecoration="underline";
    }
})