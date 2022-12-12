var plus = document.getElementById('plus');
var minus = document.getElementById('minus');
var p = document.getElementById('seats');
var form = document.getElementById('form');
var submit = document.getElementById('submit');
var seatsInput = document.getElementById('hiddenValue')
var posti = 0;

plus.addEventListener('click', () => {
    if(posti <10){
        posti++;
        p.innerHTML = posti;
    }
})


minus.addEventListener('click', () => {
        if(posti >1){
        posti--;
        p.innerHTML = posti;
    }
})

submit.addEventListener('click', () => {
    seatsInput.value = posti;
    form.submit();
})