console.log("hey")

//OPEN AND CLOSE ORDER PICKED
$('.view-bag').click(function(){
    $('.side-hidden').toggleClass('slide')  
})
$('.view-bag').hover(function(){
    $('.side-hidden').toggleClass('peek')  
})






$('.inventory-tab').click(function(){
    $('.add-menu').addClass('hide')
    $('.order-records').addClass('hide')

    $('.add-menu-tab').removeClass('active')
    $('.order-records-tab').removeClass('active')

    $('.inventory-tab').addClass('active')
    $('.menu-inventory').removeClass('hide')
})
$('.add-menu-tab').click(function(){
    $('.menu-inventory').addClass('hide')
    $('.order-records').addClass('hide')
    
    $('.inventory-tab').removeClass('active')
    $('.order-records-tab').removeClass('active')

    $('.add-menu-tab').addClass('active')
    $('.add-menu').removeClass('hide')
})
$('.order-records-tab').click(function(){
    $('.menu-inventory').addClass('hide')
    $('.add-menu').addClass('hide')

    $('.inventory-tab').removeClass('active')
    $('.add-menu-tab').removeClass('active')

    $('.order-records-tab').addClass('active')
    $('.order-records').removeClass('hide')
})



//$(this)
//for reference


//CHANGE MENU TITLE
const menu_title = $('.menu-title')//the title displayed for the menu category element

function view_burgers(tab_clicked){ //this function is triggered with onclick
    $('.menu-display').load("update-menu-ctgry.php", { //ajax which it loads new items to the parent without leaving the page
        menu_ctgry : 'burger' //the value of category is passed through the sql query
    })

    menu_title.html("Burgers")//changes the value of the title element
    $('.menu-search').addClass('hide')
}

function view_pasta(tab_clicked){
    $('.menu-display').load("update-menu-ctgry.php", {
        menu_ctgry : 'pasta'
    }) 

    menu_title.html("Pastas")
    $('.menu-search').addClass('hide')
}


function view_pizzas(tab_clicked){
    $('.menu-display').load("update-menu-ctgry.php", {
        menu_ctgry : 'pizza'
    }) 

    menu_title.html("Pizzas")
    $('.menu-search').addClass('hide')
}

function view_quenchers(tab_clicked){
    $('.menu-display').load("update-menu-ctgry.php", {
        menu_ctgry : 'quenchers'
    }) 

    menu_title.html("Quenchers")
    $('.menu-search').addClass('hide')
}

function view_all(tab_clicked){
    $('.menu-display').load("update-menu-ctgry.php", {
        menu_ctgry : 'all'
    }) 

    menu_title.html("All")
    $('.menu-search').addClass('hide')
}





//MENU INVENTORY SHOW
function show_all(){
    $('.menu-data').load("update-inventory-show.php", {
        inventory_show : 'all'
    })
}

function show_available(){
    $('.menu-data').load("update-inventory-show.php", {
        inventory_show : 'Available'
    })
}

function show_unavailable(){
    $('.menu-data').load("update-inventory-show.php", {
        inventory_show : 'Unavailable'
    })
}





//ORDER INVENTORY STATUS SHOW
function order_all(){
    $('.order-data').load("update-order-show.php", {
        order_show : 'all'
    })
}

function show_pending(){
    $('.order-data').load("update-order-show.php", {
        order_show : 'Pending'
    })
}

function show_delivered(){
    $('.order-data').load("update-order-show.php", {
        order_show : 'Delivered'
    })
}

function show_canceled(){
    $('.order-data').load("update-order-show.php", {
        order_show : 'Canceled'
    })
}


//ORDER INVENTORY TIME SHOW
function show_oldest(){
    $('.order-data').load("update-order-show.php", {
        order_show : 'DESC'
    })
}

function show_newest(){
    $('.order-data').load("update-order-show.php", {
        order_show : 'ASC'
    })
}





//ORDER SEARCH
$('.search-toggle').click(function(){
    $('.menu-search').removeClass('hide')
    menu_title.html("Search")
})

$('#submit_search').click(function(){
    $.ajax({
        type : 'POST',
        url : 'search-menu.php',
        data : {
            input_search : $('#input_search').val(),
        },
        success:function(data){
            $('.menu-display').html(data);
        }
    })
})


$('.add-to-bag').click(function(){
    if($(this).data('status') == "Unavailable"){
        alert("This item is unavailable")
        return
    }else{
        var name = $(this).data('name')
        var price = $(this).data('price')
        //alert("clicked")
        var new_row = document.createElement('tr')
        //new_row.innerHTML = name;
        var bag_data = $('.bag-data')[0] 
        var row_names = new_row.getElementsByClassName('bag-data')
    
        var new_row_data = `
                    <tr>
                        <td>${name}</td>
                        <td class="bag-data-price">${price}</td>
                        <td>
                            <input placeholder="1" value="1" onkeyup="update_price(this, ${price})" class="bag-data-qty" type="number">
                            <button class="delete" onclick="delete_item(this)"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>`
        new_row.innerHTML = new_row_data
        bag_data.append(new_row)
        update_price()
    }
    

})

function delete_item(){
    //alert("clicked")
    var bag_data = $('.bag-data > tr')
    
    for (let i = 0; i < bag_data.length; i++) {
        var delete_button = $(bag_data[i])
        delete_button.click(function(){
            $(this).remove()
            update_price()
        })
    }
    
}

function update_price(){
    var total = 0

    var bag_data = $('.bag-data > tr')
    var total
    for (let i = 0; i < bag_data.length; i++) {

        var row_qty = $(bag_data[i]).find('.bag-data-qty').val()
        var row_total = $(bag_data[i]).find('.bag-data-price').html() * row_qty
        console.log(row_total)
        total += row_total
    }
    console.log(total)

   document.querySelector('.bag-total').innerText = total


}


