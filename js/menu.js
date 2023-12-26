const openMenu = document.querySelector('.open-menu');
const closeMenu = document.querySelector('.close-menu');
const menu = document.querySelector('.menu');
const list = document.querySelectorAll('.menu-link');

//cambio de color al header cuando se hace scroll

/* window.addEventListener('scroll', ()=> {

    const header = document.querySelector('header');

    const scroll = window.scrollY;

    if (scroll>10) {
        header.style.backgroundColor = '#000';
        
    }else {
        header.style.backgroundColor = 'transparent';
    }
}); */


//funcionalidad menu mobile

openMenu.addEventListener("click",()=>{
    menu.classList.add('menu_visible');
    openMenu.style.display = "none";
    closeMenu.style.display = "block";
});

function cerrarMenu() {
    menu.classList.remove('menu_visible');
    openMenu.style.display = "block";
    closeMenu.style.display = "none";
};

closeMenu.addEventListener("click",()=>{
    cerrarMenu();
});

list.forEach(e =>{
    e.addEventListener("click", ()=>{
        cerrarMenu();
    });
});