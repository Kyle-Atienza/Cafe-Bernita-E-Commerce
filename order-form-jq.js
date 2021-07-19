

var delete_menu = $('.delete-menu')//selects the all the delete menu button
for (let i = 0; i < delete_menu.length; i++) {//iterates through the button array
    var button = delete_menu[i]//select a single button
    button.addEventListener("click", function(event){//listens for the click on the button
        var button_clicked = event.target//the deletion will happen in the current clicked button
        button_clicked.parentElement.parentElement.remove()//the parent of the parent which is the row will be removed
    })
    
}

var price = +$('.menu-price').text()
var quantity = +$('.menu-qty').text()
var subtotal = +$('.menu-subtotal').text()
var get_subtotal = $()







