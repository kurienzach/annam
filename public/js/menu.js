$(document).ready(function() {
    dish_template = _.template($("#menu_item_template").html());
    $dish_div = $('.dishes-holder');

    // Select Lunch Dinner etc based on time of the day
    hour = current_hour;
    //if (hour >= 0 && hour <= 10) {
        //$('.category-select[value=Breakfast]').prop('checked', true);
        //render_dishes('Breakfast');
    //}
    //else if (hour > 10 && hour <= 14) {
        //$('.category-select[value=Lunch]').prop('checked', true);
        //render_dishes('Lunch');
    //}
    //else if (hour > 14 && hour <= 21) {
        //$('.category-select[value=Dinner]').prop('checked', true);
        //render_dishes('Dinner');
    //}
    //else {
        //$dish_div.html('No menu available for the selected date. Please try a different date');
    //}

    $('.category-select').click(function () { 
        // Logic to show error if user tries to select a
        // category which is already past in time
        var category = $(this).val();
        if (menu_date == today_date) {
            switch(category) {
                case "Breakfast":
                    if (current_hour >= 10) {
                        alert("You can't order Breakfast now");
                        return false;
                    }
                    break;
                case "Lunch":
                    if (current_hour >= 14) {
                        alert("You can't order Lunch now");
                        return false;
                    }
                    break;
                case "Dinner":
                    if (current_hour >= 21) {
                        alert("You can't order Dinner now");
                        return false;
                    }
                    break;
            }
        }

        checkedState = $(this).prop('checked');
        if (checkedState == undefined)
            checkedState = false;
        else if (checkedState == false)
            checkedState = true;
        $('.category-select:checked').each(function () {
            $(this).prop('checked', false);
        });
        $(this).prop('checked', checkedState);
        menu_category = category;

        $('.select-category-text').hide();

        render_dishes($(this).val());
        
    });

    $('.menu-date-select').click(function() {
        menu_date = $(this).data('date');
        $('.dishes-holder').empty();
        $('.category-select').prop('checked', false);
        $('.select-category-text').show();
    });

    $('.add-cart').text(cart.length);

    $('.update_loc').click(function() {
        update_location($(this).prev().val());
    });

    $('#updatelocation').ajaxForm({success:function(data) {
        console.log("Location updated with server\n" + data);   
    }});
    
    // $('.cart-display').click(function() {
        // $('form #cart').val(JSON.stringify(cart));
        // $('form').submit();
    // });
});

function update_location(text) {
    $('.location-label span span').html(text);
    $('#txtlocation').val(text);
    $('.location-select-modal').toggle();
    $('#updatelocation').submit();
}

function init_cart_add() {
    $('.input-number').change(function() {
        // Logic to add to cart
        if(valueCurrent >= minValue && valueCurrent <= maxValue) {
            if (valueCurrent == 0) {
                // remove product from cart if already added
                remove_from_cart($(this).closest('.iconBox').find('.dish-id').text(), $(this).val());
            }
            else {
                // add product to cart
                add_to_cart($(this).closest('.iconBox').find('.dish-id').text(), $(this).val());
            }
            $('.add-cart').text(cart.length);
            sync_cart_server();
        }
    });
}

function render_dishes(category) {
    // Filter the dishes and render only for current category
    $dish_div.empty();
    _.each(dishes, function(dish) {
        if (dish["categories"].indexOf(category) > -1) {
            $dish = $(dish_template({dish: dish}));

            cart_index = search_in_cart(dish["id"]);
            if (cart_index >= 0) {
                $dish.find('.input-number').val(cart[cart_index]['qty']);
            }

            $dish_div.append($dish);
        }

    });
    init_cart_controls();
    init_cart_add();
}

function get_dish(id) {
    for (i=0; i<dishes.length; i++) {
        if (dishes[i]['id'] == id) {
            return dishes[i];
        }
    }
}

// Cart functions
function add_to_cart(item, qty) {
    var index = search_in_cart(item);
    var dish;
    var isAdded = "added to";
    if (index == -1) {
        dish = get_dish(item);
        cart.push({"id": item, "date": menu_date, "category": menu_category, "name": dish['name'], "price": dish['price'],"qty": qty});

        // Show popup notification
        $alert = $('<div class="alert alert-success" style="display:none">' + dish['name'] + ' added to your cart</div>');
        $('.alert-box').append($alert);
        $alert.fadeIn();
        setInterval(function() {
            $alert.slideUp(); 
        }, 2000);
    }
    else {
        if (cart[index]["qty"] < qty)
            isAdded = "removed from";
        cart[index]["qty"] = qty;
        dish = cart[index];
    }

}

function remove_from_cart(item) {
    var index = search_in_cart(item);
    if (index != -1) {

        // Show popup notification
        $alert = $('<div class="alert alert-success" style="display:none">' + cart[index]['name'] + ' removed from  your cart</div>');
        $('.alert-box').append($alert);
        $alert.fadeIn();
        setInterval(function() {
            $alert.slideUp(); 
        }, 2000);

        cart.splice(index, 1);
    }
}

function search_in_cart(item) {
    for (i = 0; i<cart.length; i++) {
        if (cart[i]["id"] == item) {
            if (cart[i]["date"] == menu_date && cart[i]["category"] == menu_category)
                return i; 
        }
    }
    return -1;
}
