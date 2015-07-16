$(document).ready(function() {
    dish_template = _.template($("#menu_item_template").html());
    $dish_div = $('.dishes-holder');
    _.each(dishes, function(dish) {
        $dish_div.append(dish_template({dish: dish}));
    });
});
