<?php

use Illuminate\Support\Facades\URL;


$tab = (explode('tab=', URL::current()));

?>


<?php $__env->startSection('meta-tags'); ?>

    <title>Januya</title>
    <meta name="description"
          content="Januya - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="Januya"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main id="mt-main">
        <!-- Mt Product Detial of the Page -->
        <section class="mt-product-detial wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">

                <div class="row">                  
                    <?php if(old('error')): ?>
                        <div class="alert alert-danger" style="width: 100%; margin-top: 30px">
                            <div class="">
                                <p style="color:red;"><?php echo e(old('error')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="col-xs-12">                        
                        <!-- Slider of the Page -->
                        <div class="slider">
                            <!-- Comment List of the Page -->
                            <ul class="list-unstyled comment-list">
                                <li><a href="#"><i
                                                class="fa fa-heart"></i><?php echo e(\App\Models\Product::getLike($product->product_id)); ?>

                                    </a></li>
                                <li><a href="#"><i class="fa fa-comments"></i><?php echo e(count($reviews)); ?></a></li>
                            </ul>                                        
                            <!-- Comment List of the Page end -->
                            <!-- Product Slider of the Page -->
                            <div class="product-slider">
                                <div class="slide">
                                    <div class="slide_image" style="
                                            background-image: url('<?php echo e($product->product_image); ?>');                                            
                                            ">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Slider of the Page end -->
                        <!-- Detail Holder of the Page -->
                        <div class="detial-holder">                            
                            <!-- Breadcrumbs of the Page -->
                            <ul class="list-unstyled breadcrumbs">
                                <li><a href="/"> <?php echo app('translator')->get('app.home'); ?> <i class="fa fa-angle-right"></i></a></li>
                                <li> <?php echo app('translator')->get('app.products'); ?> </li>
                            </ul>
                            <!-- Breadcrumbs of the Page end -->
                            <h2><?php echo e($product->product_name_ru); ?></h2>
                            <!-- Rank Rating of the Page -->
                            <div class="rank-rating">
                                <ul class="list-unstyled rating-list">
                                    <?php for($i = 0; $i <  5; $i++): ?>
                                        <?php if($i < \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW)): ?>
                                            <li><a href="#"><i class="fa fa-star"></i></a></li>
                                        <?php else: ?>
                                            <li><a href="#"><i class="fa fa-star-o"></i></a></li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </ul>
                                <span class="total-price"> <?php echo app('translator')->get('app.reviews'); ?> (<?php echo e(count($reviews)); ?>)</span>
                            </div>
                            <!-- Rank Rating of the Page end -->
                            <div id="reload-heart">
                                <ul class="list-unstyled list">
                                    <?php if(Auth::user()): ?>
                                        <li><a href="#" data-toggle="modal" data-target=".bs-example-modal-lg"><i
                                                        class="fa fa-share-alt"></i> <?php echo app('translator')->get('app.share'); ?> </a></li>
                                    <?php endif; ?>                               
                                </ul>
                            </div>                            
                            <div class="txt-wrap">
                                <p><?php echo e($product->product_desc_ru); ?></p>
                            </div>
                            <div class="text-holder">
                                <span class="price"> <?php echo app('translator')->get('app.price'); ?>: &nbsp; $<?php echo e($product->product_price); ?> &nbsp; (<?php echo e($product->product_price * \App\Models\Currency::DollarToKzt); ?> &#8376;)</span>
                            </div>
                            <!-- Product Form of the Page -->
                            <div class="product-form">                                
                                <fieldset>
                                    <div class="row-val">
                                        <label for="qty">Кол-во</label>
                                        <input type="number" value="1" id="product_count" />
                                    </div>
                                    <div class="row-val">
                                        <button onclick="showOrderFormModal($(this), <?php echo e($product->product_id); ?>, <?php echo e(Auth::check()); ?>)"> <?php echo app('translator')->get('app.buy_product'); ?> </button>                                        
                                    </div>
                                </fieldset>
                            </div>
                        <!-- Product Form of the Page end -->
                        </div>
                        <!-- Detail Holder of the Page end -->
                    </div>
                </div>
            </div>
        </section><!-- Mt Product Detial of the Page end -->
        <div class="product-detail-tab wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="mt-tabs text-center text-uppercase">
                            <li><a href="#tab1" class="<?php echo e(!isset($tab[1]) ? 'active' : ''); ?>"> <?php echo app('translator')->get('app.description'); ?> </a></li>
                            <li><a href="#tab2"> <?php echo app('translator')->get('app.consist'); ?> </a></li>
                            <li><a href="#tab3" class="<?php echo e(isset($tab[1]) && $tab[1] == 'review' ? 'active' : ''); ?>"> <?php echo app('translator')->get('app.reviews'); ?> (<?php echo e(count($reviews)); ?>

                                    )</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab1">
                                <p style="white-space: pre-line;font-weight: 400;font-size: 110%;">
                                    <?php echo e($product->full_description_ru); ?>

                                </p>
                            </div>
                            <div id="tab2">
                                <p style="white-space: pre-line;font-weight: 400;font-size: 110%;">
                                    <?php echo e($product->information); ?>

                                </p>
                            </div>
                            <div id="tab3">
                                <div class="product-comment">
                                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <div class="mt-box">
                                            <div class="mt-hold">
                                                <ul class="mt-star">
                                                    <?php for($i = 0; $i <= 5; $i++): ?>
                                                        <?php if($i < $review->rating): ?>
                                                            <li><i class="fa fa-star"></i></li>
                                                        <?php elseif($i > $review->rating): ?>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        <?php endif; ?>
                                                    <?php endfor; ?>
                                                </ul>
                                                <span class="name"><?php echo e($review->user_name); ?></span>
                                                <?php $time = date('H:m d.m.Y', strtotime($review->created_at)) ?>
                                                <time datetime="2016-01-01"><?php echo e($time); ?></time>
                                            </div>
                                            <p style="white-space: pre-line;">
                                                <?php echo e($review->review_text); ?>

                                            </p>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>




                                    <?php echo e(Form::open(['action' => ['Index\ReviewController@store'], 'method' => 'POST'])); ?>

                                    <?php echo e(Form::token()); ?>

                                    <?php echo e(Form::hidden('item_id', $product->product_id)); ?>

                                    <?php echo e(Form::hidden('review_type_id', \App\Models\Review::PRODUCT_REVIEW)); ?>

                                    <fieldset>
                                        <?php if($errors->any()): ?>
                                            <div class="alert alert-danger" style="color: red;">
                                                <ul>
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>

                                        <h2> <?php echo app('translator')->get('app.add_comment'); ?> </h2>

                                        <div class="mt-row">
                                            <label style="color: black;"> <?php echo app('translator')->get('app.rating'); ?> </label>
                                            <div class="rating">
                                                <input id="demo-1" type="radio" name="rating" value="1">
                                                <label for="demo-1">1 star</label>
                                                <input id="demo-2" type="radio" name="rating" value="2">
                                                <label for="demo-2">2 stars</label>
                                                <input id="demo-3" type="radio" name="rating" value="3">
                                                <label for="demo-3">3 stars</label>
                                                <input id="demo-4" type="radio" name="rating" value="4">
                                                <label for="demo-4">4 stars</label>
                                                <input id="demo-5" type="radio" name="rating" value="5">
                                                <label for="demo-5">5 stars</label>

                                                <div class="stars">
                                                    <label for="demo-1" aria-label="1 star" title="1 star"></label>
                                                    <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                                                    <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                                                    <label for="demo-4" aria-label="4 stars" title="4 stars"></label>
                                                    <label for="demo-5" aria-label="5 stars" title="5 stars"></label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mt-row">
                                            <?php echo e(Form::label('Имя', null, ['class' => 'control-label', 'style'=> 'font-weight:bold;color:black;'])); ?>

                                            <?php echo e(Form::text('user_name',(Auth::user() ? Auth::user()->name : ''), ['class' => 'form-control'])); ?>

                                        </div>
                                        <div class="mt-row">
                                            <?php echo e(Form::label('E-mail', null, ['class' => 'control-label', 'style'=> 'font-weight:bold;color:black;'])); ?>

                                            <?php echo e(Form::text('user_email',(Auth::user() ? Auth::user()->email : '') , ['class' => 'form-control'])); ?>

                                        </div>
                                        <div class="mt-row">
                                            <?php echo e(Form::label('Отзыв', null, ['class' => 'control-label', 'style'=> 'font-weight:bold;color:black;'])); ?>

                                            <?php echo e(Form::textarea('review_text',null, ['class' => 'form-control'])); ?>

                                        </div>
                                        <?php echo e(Form::submit('Добавить отзыв', ['class'=> 'btn-type4'])); ?>

                                    </fieldset>
                                    <?php echo e(Form::close()); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-products wow fadeInUp" data-wow-delay="0.4s">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2> <?php echo app('translator')->get('app.simple_products'); ?> </h2>
                        <div class="row">
                            <div class="col-xs-12 text_center">
                                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div class="mt-product1 mt-paddingbottom20">
                                        <div class="box">
                                            <div class="b1">
                                                <div class="b2">
                                                    <a href="<?php echo e(route('product.detail', ['id' => $product->product_id])); ?>">
                                                        <div style="
                                                                background-image: url('<?php echo e($product->product_image); ?>');
                                                                background-position: center;
                                                                background-repeat: no-repeat;
                                                                background-size: cover;
                                                                width: 215px;
                                                                height: 215px;
                                                                ">

                                                        </div>
                                                    </a>
                                                    <span class="caption">
														</span>
                                                    <ul class="mt-stars">
                                                        <?php for($i = 0; $i<5;$i++): ?>
                                                            <?php if($i < \App\Models\Review::ratingCalculator($product->product_id, \App\Models\Review::PRODUCT_REVIEW)): ?>
                                                                <li><i class="fa fa-star"></i></li>
                                                            <?php else: ?>
                                                                <li><i class="fa fa-star-o"></i></li>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </ul>                                                   
                                                </div>
                                            </div>
                                        </div>
                                        <div class="txt">
                                            <strong class="title">
                                                <a href="<?php echo e(route('product.detail', ['id' => $product->product_id])); ?>">
                                                    <?php echo e($product->product_name_ru); ?>

                                                </a>
                                            </strong>
                                            <span class="price"><i class="fa fa-dollar"></i>
                                                <span>
                                                    <?php echo e($product->product_price); ?> &nbsp;
                                                    (<?php echo e($product->product_price * \App\Models\Currency::usdToKzt()); ?> тг)
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade " id="order_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <div class="title-group"
                             style="margin-left: 20px; font-size: 120%; color: black; font-weight: 400;">
                            <h4 class="modal-title">Форма заявки</h4>                            
                        </div>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo e(route('smartpay_create_order')); ?>" method="POST">
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="products[]" id="product_id">
                            <div id="user_not_partner">
                                <div class="form-group">
                                    <label for="username">ФИО</label>
                                    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp" placeholder="ФИО">                              
                                </div>
                                <div class="form-group">
                                    <label for="contact">Контакт</label>
                                    <input type="text" class="form-control" id="contact" name="contact" placeholder="+7 (777) 777 77 77">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="noreply@example.com">
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label for="address">Адрес</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="г.Алматы ул.Абая 187а кв 94">
                            </div>                            
                            
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <div class="title-group"
                             style="margin-left: 20px; font-size: 120%; color: black; font-weight: 400;">
                            <h4 class="modal-title">Пригласить друга</h4>
                            <h5 class="modal-title">Вы можете поделиться со своими друзьями в социальной сети</h5>
                            <h5 class="modal-title">https://Januya.kz/</h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <ul style="list-style: none;">
                            <li>
                                <a href="https://api.whatsapp.com/send?text=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid lightgreen;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: lightgreen;" class="fa fa-whatsapp"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Whatsapp</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://telegram.me/share/url?url=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="
                                    background-image: url('https://bitnovosti.com/wp-content/uploads/2017/02/telegram-icon-7.png');
                                    background-position: center;
                                    background-size: cover;
                                    width: 18px;height: 18px;
                                    bottom: -5px;
                                    "
                                       class="fa fa-telegram"
                                    >

                                    </i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Telegram</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://www.facebook.com/sharer.php?u=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-facebook"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Facebook</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="http://vk.com/share.php?url=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-vk"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через VK</span>
                                </a>

                            </li>
                            <li style="margin-top: 15px;">
                                <a href="https://twitter.com/share?url=<?php echo e($url); ?>" style="
                                padding:5px 10px 5px 10px;
                                border: 2px solid dodgerblue;
                                border-radius: 3px;
                                font-size: 130%;
                                ">
                                    <i style="font-weight: 500;color: dodgerblue;" class="fa fa-twitter"></i>
                                    <span style="font-weight: 500;color: black;margin-left: 1rem;">Поделиться через Twiiter</span>
                                </a>

                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('new_design.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>