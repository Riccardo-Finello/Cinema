var p = document.getElementById('psw');
var p2 = document.getElementById('psw2');
var submit = document.getElementById('submit');

submit.addEventListener('click', async (e) => {

    e.preventDefault();

    var form = document.querySelector("#form");
    if(p.value == p2.value){

        if (form.checkValidity()) {
            var formData = new FormData(form);

            await fetch('../php/register.php',
                { method: 'POST', body: formData }
            )
            .then(response => response.text())
            .then(success => {

                if (success.trim() == "success") {
                    alert("profilo creato con successo");
                    window.location.href='../php/loginInterface.php';
                }
                else if(success.trim() == "exists"){
                    var error=document.getElementById("error");
                    error.innerHTML = 'Esiste già un account con questa mail, fai il login!';
                    error.style.color= 'red';
                    error.style.cursor='pointer';
                    error.style.textDecoration="underline";
                    error.addEventListener('click', ()=>window.location.href="../php/loginInterface.php");
                    submit.insertAdjacentElement('beforebegin',error);
                }
            });

            form.reset();
        }
        else{
            
            form.reportValidity();
        }
    }
    else{
        var error=document.getElementById("error");
        error.innerHTML = 'La password non è ripetuta correttamente!';
        error.style.color= 'red';
        error.style.cursor='pointer';
        error.style.textDecoration="underline";
        submit.insertAdjacentElement('beforebegin',error);
    }
})