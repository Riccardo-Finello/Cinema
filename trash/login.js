var button = document.querySelector("#submit");

button.addEventListener('click', async () => {

    var form = document.querySelector("#form");

    //se il form è valido richiamo le API
    if (form.checkValidity()) {

        var formData = new FormData(form);

        await fetch('../php/login.php',
            { method: 'POST', body: formData }
        )
        .then(response => response.text())
        .then(success => {

            if (success.trim()=="ok") {
                window.location.href='../html/home.html';
            }
            else if(success.trim() == "error"){
                var error=document.createElement('p');
                error.innerHTML = 'Account non trovato, registrati ora!';
                error.style.color= 'red';
                error.style.cursor='pointer';
                error.style.textDecoration="underline";
                error.addEventListener('click', ()=>window.location.href="../html/register.html");
                button.insertAdjacentElement('beforebegin',error);
            }
        });

        form.reset();
    }
    else{
        
        form.reportValidity();
    }
})