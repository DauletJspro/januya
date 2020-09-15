<?php $packet_list = \App\Models\UserPacket::leftJoin('packet', 'packet.packet_id', '=', 'user_packet.packet_id')
    ->where('user_id', $val->user_id)
    ->where('is_active', 1)
    ->orderBy('packet.packet_id', 'asc')
    ->get() ?>

<?php $__currentLoopData = $packet_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <span class="label user-packet-span"
              style="background-color: #<?php echo e($item['packet_css_color']); ?>"><?php echo e($item['packet_name_ru']); ?></span>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>