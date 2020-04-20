<?php $__env->startSection('content'); ?>

        <section class="content-header">
            <h1>
              <?php echo e($title); ?>

            </h1>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                   <div class="col-md-8" style="padding-left: 0px">
                       <div class="box box-primary">
                           <?php if(isset($error)): ?>
                               <div class="alert alert-danger">
                                   <?php echo e($error); ?>

                               </div>
                           <?php endif; ?>
                           <?php if($row->about_id > 0): ?>
                               <form action="/admin/about/<?php echo e($row->about_id); ?>" method="POST">
                                   <input type="hidden" name="_method" value="PUT">
                           <?php else: ?>
                               <form action="/admin/about" method="POST">
                           <?php endif; ?>
                                   <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                   <input type="hidden" name="about_id" value="<?php echo e($row->about_id); ?>">
                                   <input type="hidden" value="<?php if(isset($_GET['parent_id'])): ?><?php echo e($_GET['parent_id']); ?><?php endif; ?>" name="parent_id">
                                   <input type="hidden" value="<?php echo e($row->about_image); ?>" name="about_image" class="image-name">

                                   <div class="box-body">
                                       <div class="form-group">
                                           <label>Название (Рус)</label>
                                           <input value="<?php echo e($row->about_name_ru); ?>" type="text" class="form-control" name="about_name_ru" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Текст (Рус)</label>
                                           <textarea name="about_text_ru" class="form-control text_editor"><?php echo $row->about_text_ru; ?></textarea>
                                       </div>
                                       <div class="form-group">
                                           <label>Название (Каз)</label>
                                           <input value="<?php echo e($row->about_name_kz); ?>" type="text" class="form-control" name="about_name_kz" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Текст (Каз)</label>
                                           <textarea name="about_text_kz" class="form-control text_editor"><?php echo $row->about_text_kz; ?></textarea>
                                       </div>
                                       <div class="form-group">
                                           <label>Название (Анг)</label>
                                           <input value="<?php echo e($row->about_name_en); ?>" type="text" class="form-control" name="about_name_en" placeholder="Введите">
                                       </div>
                                       <div class="form-group">
                                           <label>Текст (Анг)</label>
                                           <textarea name="about_text_en" class="form-control text_editor"><?php echo $row->about_text_en; ?></textarea>
                                       </div>
                                   </div>
                                   <div class="box-footer">
                                       <button type="submit" class="btn btn-primary">Сохранить</button>
                                   </div>
                                </form>
                       </div>
                   </div>
                    <div class="col-md-4">
                        <div class="box box-primary" style="padding: 30px; text-align: center">
                            <div style="padding: 20px; border: 1px solid #c2e2f0">
                                <img class="image-src" src="<?php echo e($row->about_image); ?>" style="width: 100%; "/>
                            </div>
                            <div style="background-color: #c2e2f0;height: 40px;margin: 0 auto;width: 2px;"></div>
                            <form id="image_form" enctype="multipart/form-data" method="post" class="image-form">
                                <i class="fa fa-plus"></i>
                                <input id="avatar-file" type="file" onchange="uploadImage()" name="image"/>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>