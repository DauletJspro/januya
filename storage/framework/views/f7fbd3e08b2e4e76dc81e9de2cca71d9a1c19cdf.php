<!DOCTYPE html>
<html lang="en-US">

<?php echo $__env->make('design_index.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<body class="home page-template page-template-tpl page-template-front-page page-template-tplfront-page-php page page-id-262  has-topbar header_sticky wide sidebar-left bottom-center wpb-js-composer js-comp-ver-5.1.1 vc_responsive">

<div class="themesflat-boxed">
    <!-- Preloader -->
    <div class="preloader">
        <div class="clear-loading loading-effect-2">
            <span></span>
        </div>
    </div>
</div>
<?php
use \Illuminate\Support\Facades\Session;
?>
<?php if(Session::has('danger')): ?>
    <div class="alert-custom-danger hide-div" style="">
        <?php echo e(Session::get('danger')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <div class="alert-custom-success hide-div" style="">
        <?php echo e(Session::get('success')); ?>

    </div>
<?php endif; ?>

<div id="wrapper">
    <div id="pre-loader" class="loader-container text-center">
        <div class="loader text-center" style="width: 15%;">
            <img src="/new_design/images/logo/logo.png" style="width: 100%;" alt="loader">
        </div>
    </div>
    <div class="w1">
        <div class="mt-search-popup">
            <div class="mt-holder">
                <a href="#" class="search-close"><span></span><span></span></a>
                <div class="mt-frame">
                    <form action="#">
                        <fieldset>
                            <input type="text" placeholder="Search...">
                            <span class="icon-microphone"></span>
                            <button class="icon-magnifier" type="submit"></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        <?php echo $__env->yieldContent('content'); ?>
//        <?php echo $__env->make('design_index.layout.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <span id="back-top" class="fa fa-arrow-up"></span>
</div>
</div>


<script src="/new_design/js/jquery.js"></script>
<script src="/new_design/js/plugins.js"></script>
<script src="/new_design/js/jquery.main.js"></script>
<script src="/notify/notify.js"></script>
<script src="/notify/notify.min.js"></script>
<?php echo $__env->yieldContent('js'); ?>

<script>

    $('.hide-div').delay(5000).fadeOut('slow');

    function addItemToBasket(tag_object) {
        var method = $(tag_object).data('method');
        var item_id = $(tag_object).data('item-id');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        if (user_id) {
            ajax(route, method, item_id, user_id);
        } else {
            window.location.href = '<?php echo e(route('login.show')); ?>';
        }
    }

    function addItemToFavorites(tag_object) {
        var method = $(tag_object).data('method');
        var item_id = $(tag_object).data('item-id');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        var session_id = $(tag_object).data('session-id');
        ajax(route, method, item_id, user_id, session_id);
    }

    function addAfterAuthToFavorites(tag_object) {
        var method = $(tag_object).data('method');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        ajax(route, method, null, user_id, null);
    }

    function cancelItemAfterAuth(tag_object) {
        var method = $(tag_object).data('method');
        var user_id = $(tag_object).data('user-id');
        var route = $(tag_object).data('route');
        ajax(route, method, null, user_id, null);
    }


    function ajax(route, method, item_id = null, user_id, session_id = null) {
        var controllerName = route.split('/')[3];
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: route,
            type: "POST",
            data: {
                _token: CSRF_TOKEN,
                method_name: method,
                item_id: item_id,
                user_id: user_id,
                session_id: session_id
            },
            success: function (data) {
                if (controllerName == 'basket') {
                    if (method == 'delete') {
                        $("#product-section").load(location.href + " #product-section");
                        $("#total-price-div").load(location.href + " #total-price-div");
                    } else if (data.method == 'add') {
                        if (data.success == 1) {
                            $.notify(data.message, "success");
                        } else if (data.success == -1) {
                            $.notify(data.message, "error");
                        } else if (data.success == 0) {
                            $.notify(data.message, "error");
                        }
                        $("#basket-box").load(location.href + " #basket-box");
                    }
                } else if (controllerName == 'favorite') {
                    if (data.success == 1) {
                        $.notify(data.message, "success");
                        $("#favoriteCount").load(location.href + " #favoriteCount");
                        $("#reload-items").load(location.href + " #reload-items");
                        $("#reload-heart").load(location.href + " #reload-heart");
                    } else if (data.success == 2) {
                        $.notify(data.message, "warning");
                        $("#favoriteCount").load(location.href + " #favoriteCount");
                        $("#reload-items").load(location.href + " #reload-items");
                        $("#reload-heart").load(location.href + " #reload-heart");
                    } else if (data.success == 0) {
                        $.notify(data.message, "danger");
                        $("#favoriteCount").load(location.href + " #favoriteCount");
                    }
                }
            }
        });
    }
</script>

</body>
</html>

