var plus = document.getElementById('plus');
var minus = document.getElementById('minus');
var p = document.getElementById('seats');
var form = document.getElementById('form');
var submit = document.getElementById('submit');
var seatsInput = document.getElementById('hiddenValue');
var remove = document.getElementById('removeButton');
var removeForm = document.getElementById('removeForm');
var posti = 1;

try{
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
}
catch{
remove.addEventListener('click', () => {
    removeForm.submit();
})
}