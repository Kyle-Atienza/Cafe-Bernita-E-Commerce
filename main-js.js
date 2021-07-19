const menu_title = document.querySelector('.menu-title')//title of current menu tab

//reference function for tab
function view_burgers(tab_clicked){
    const active_tab = document.querySelectorAll('.menu-categories .active')
    active_tab.forEach(element => {
        element.classList.remove('active')
    });
    tab_clicked.classList.add('active')
    menu_title.innerHTML = "Burgers"
}

function view_pasta(tab_clicked){
    const active_tab = document.querySelectorAll('.menu-categories .active')
    active_tab.forEach(element => {
        element.classList.remove('active')
    });
    tab_clicked.classList.add('active')
    menu_title.innerHTML = "Pastas"
}

function view_pizzas(tab_clicked){
    const active_tab = document.querySelectorAll('.menu-categories .active')
    active_tab.forEach(element => {
        element.classList.remove('active')
    });
    tab_clicked.classList.add('active')
    menu_title.innerHTML = "Pizzas"
}

function view_rmeals(tab_clicked){
    const active_tab = document.querySelectorAll('.menu-categories .active')
    active_tab.forEach(element => {
        element.classList.remove('active')
    });
    tab_clicked.classList.add('active')
    menu_title.innerHTML = "Rice Meals"
}

function view_fands(tab_clicked){
    const active_tab = document.querySelectorAll('.menu-categories .active')
    active_tab.forEach(element => {
        element.classList.remove('active')
    });
    tab_clicked.classList.add('active')
    menu_title.innerHTML = "Fries and Shawarma"
}

function view_bundles(tab_clicked){
    const active_tab = document.querySelectorAll('.menu-categories .active')
    active_tab.forEach(element => {
        element.classList.remove('active')
    });
    tab_clicked.classList.add('active')
    menu_title.innerHTML = "Barkada Bundles"
}

function view_quenchers(tab_clicked){
    const active_tab = document.querySelectorAll('.menu-categories .active')
    active_tab.forEach(element => {
        element.classList.remove('active')
    });
    tab_clicked.classList.add('active')
    menu_title.innerHTML = "Quenchers"
}