$(document).ready(function() {
    dish_template = _.template($("#menu_item_template").html());
    $dish_div = $('.dishes-holder');
    _.each(dishes, function(dish) {
        $dish_div.append(dish_template({dish: dish}));
    });

    // Select Lunch Dinner etc based on time of the day
    hour = new Date().getHours();

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
});

function render_dishes(category) {
    // Filter the dishes and render only for current category
    $dish_div.empty();
    _.each(dishes, function(dish) {
        if (dish["categories"].indexOf(category) > -1)
            $dish_div.append(dish_template({dish: dish}));
    });
}
