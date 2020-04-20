<?php if(isset($document_list)): ?>

    <?php $__currentLoopData = $document_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        <div class="i-docs">
            <a href="<?php echo e($item['document_url']); ?>" target="_blank">
                <img class="img-100" src="<?php echo e($item['document_icon']); ?>" name="request_document[]">
            </a>
            <input type="hidden" value="<?php echo e($item['document_url']); ?>" class="request-document"/>
            <input type="hidden" value="<?php echo e($item['document_mini_icon']); ?>" class="document-type"/>
            <input type="hidden" value="<?php echo e($item['document_id']); ?>" class="document-id"/>
            <a href="javascript:void(0)" onclick="deleteServiceDocument(this)"><i class="icons ic-del"></i></a>
        </div>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

<?php endif; ?>
