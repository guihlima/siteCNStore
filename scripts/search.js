var btnSearch = document.querySelector('#btn__search')
var inputSearch = document.querySelector('#input__search')

btnSearch.addEventListener('click', ()=>{
    inputSearch.classList.toggle('active')
})