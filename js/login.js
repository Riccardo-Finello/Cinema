var button = document.querySelector("#submit");

button.addEventListener('click', async (e) => {

    e.preventDefault();
    var form = document.querySelector("#form");
    console.log("click");

    //se il form è valido richiamo le API
    if (form.checkValidity()) {

        var formData = new FormData(form);

        await fetch('../php/login.php',
            { method: 'POST', body: formData }
        )
        .then(response => response.text())
        .then(result => {
            if (result.trim()=="ok") {
                window.location.href='../php/home.php';
                console.log("ok");
            }
            else if(result.trim() == "error"){
                var error=document.createElement('p');
                error.innerHTML = 'Account non trovato, registrati ora!';
                error.style.color= 'red';
                error.style.cursor='pointer';
                error.style.textDecoration="underline";
                error.addEventListener('click', ()=>window.location.href="../php/registerInterface.php");
                button.insertAdjacentElement('beforebegin',error);
            }
        });

        form.reset();
    }
    else{
        
        form.reportValidity();
    }
})
