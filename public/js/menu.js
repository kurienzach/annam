$(document).ready(function() {
    dish_template = _.template($("#menu_item_template").html());
    $dish_div = $('.dishes-holder');

    // Select Lunch Dinner etc based on time of the day
    hour = current_hour;

    if (hour >= 0 && hour <= 10) {
        $('.category-select[value=Breakfast]').prop('checked', true);
        render_dishes('Breakfast');
    }
    else if (hour > 10 && hour <= 14) {
        $('.category-select[value=Lunch]').prop('checked', true);
        render_dishes('Lunch');
    }
    else if (hour > 14 && hour <= 21) {
        $('.category-select[value=Dinner]').prop('checked', true);
        render_dishes('Dinner');
    }
    else {
        $dish_div.html('No menu available for the selected date. Please try a different date');
    }

    $('.category-select').click(function () { 
        checkedState = $(this).prop('checked');
        if (checkedState == undefined)
            checkedState = false;
        else if (checkedState == false)
            checkedState = true;
        $('.category-select:checked').each(function () {
            $(this).prop('checked', false);
        });
        $(this).prop('checked', checkedState);

        render_dishes($(this).val());
        
        console.log(checkedState);
    });

    $('.cart-display').click(function() {
        $('form #cart').val(JSON.stringify(cart));
        $('form').submit();
    });
});

function render_dishes(category) {
    // Filter the dishes and render only for current category
    $dish_div.empty();
    _.each(dishes, function(dish) {
        if (dish["categories"].indexOf(category) > -1)
            $dish_div.append(dish_template({dish: dish}));
    });
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
    if (index == -1) {
        dish = get_dish(item);
        cart.push({"id": item, "name": dish['name'], "price": dish['price'],"qty": qty});
    }
    else {
        cart[index]["qty"] = qty;
    }
}

function remove_from_cart(item) {
    var index = search_in_cart(item);
    if (index != -1)
        cart.splice(index, 1);
}

function search_in_cart(item) {
    for (i = 0; i<cart.length; i++) {
        if (cart[i]["id"] == item) {
            return i; 
        }
    }
    return -1;
}
