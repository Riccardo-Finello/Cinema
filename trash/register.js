var button = document.querySelector("#submit");

button.addEventListener('click', async () => {

    var form = document.querySelector("#form");

    //se il form è valido richiamo le API
    if (form.checkValidity()) {
        
        var formData = new FormData(form);

        await fetch('../php/register.php',
            { method: 'POST', body: formData }
        )
        .then(response => response.text())
        .then(success => {

            if (success.trim() == "ok") {
                window.location.href='../html/login.html';
            }
            else if(success.trim() == "error"){
                var error=document.createElement('p');
                error.innerHTML = 'Esiste già un account con questa mail, fai il login!';
                error.style.color= 'red';
                error.style.cursor='pointer';
                error.style.textDecoration="underline";
                error.addEventListener('click', ()=>window.location.href="../html/login.html");
                button.insertAdjacentElement('beforebegin',error);
            }
        });

        form.reset();
    }
    else{
        
        form.reportValidity();
    }
})