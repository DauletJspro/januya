<?php $__env->startSection('meta-tags'); ?>
    <title><?php echo app('translator')->get('app.about_us'); ?></title>
    <meta name="description" content="Januya - это проект предлагающий уникальную натуральную продукцию с широкими бизнес возможностями"/>
    <meta name="keywords" content="Januya"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Main of the Page -->
<main id="mt-main">
    <?php echo $__env->make('new_design.about_us._first_section', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('new_design.about_us._second_section', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    
</main><!-- Main of the Page end -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('new_design.layout.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>