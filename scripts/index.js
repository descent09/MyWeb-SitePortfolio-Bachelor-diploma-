window.addEventListener('scroll', () => {
    let header = document.querySelector('header');
    header.classList.toggle('sticky', window.scrollY > 0);
})
let menu = document.querySelector('.menu');
let toggle = document.querySelector(".toggle");
function hideMenu(){
    toggle.classList.toggle('active');
    menu.classList.toggle('active');
}
toggle.addEventListener("click", hideMenu)