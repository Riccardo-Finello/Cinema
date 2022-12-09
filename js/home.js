var elements = document.getElementsByClassName("movie");

for(let element of elements){
    element.addEventListener('click', () => {
        element.closest('form').submit();
    })
}