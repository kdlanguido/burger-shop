$('#btn_sidebar_feedback').on('click', function(){
    setCookie('page=feedback');
    change_page('feedback')
})

$('#btn_sidebar_order').on('click', function(){
    setCookie('page=order');
    change_page('order')
})


$('#btn_sidebar_inventory').on('click', function(){
    setCookie('page=inventory');
    change_page('inventory')
})

$('#btn_sidebar_dashboard').on('click', function(){
    setCookie('page=dashboard');
    change_page('dashboard')
})

$('#btn_sidebar_order_history').on('click', function(){
    setCookie('page=order_history');
    change_page('order_history')
    load_order_history();
})

$('#btn_sidebar_products').on('click', function(){  
    setCookie('page=products');
    change_page('product')
    load_products();
})