<?php $__env->startSection('content'); ?>

    <section class="content-header">
        <h1>
            Мои документы
        </h1>
    </section>
    <section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary document-list">
                <input type="hidden" value="<?php echo e($user_id); ?>" id="user_id"/>
                <form id="document_upload_form" enctype="multipart/form-data" method="post">
                    <div id="document_list">
                        <?php if(isset($document_list)): ?>

                            <?php $__currentLoopData = $document_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                <div class="item-docs" id="document_item_<?php echo e($item->document_id); ?>">
                                    <span class="document-name"><?php echo e($item->document_name_ru); ?><?php if($item->is_required == 1): ?></br><span style="font-weight: bold; color: red">(обязательно)</span><?php endif; ?></span>
                                    <div class="input-box clearfix">

                                        <?php
                                        $document_request = \App\Models\UserDocument::where('user_id',$user_id)->where('document_id',$item->document_id)->orderby('user_document_id','desc')->first();
                                        ?>

                                        <?php if($document_request != null): ?>
                                            <?php $document_request = \App\Models\UserDocument::where('user_id',$document_request->user_id)->where('document_id',$item->document_id)->orderby('user_document_id','asc')->get(); ?>

                                            <?php $__currentLoopData = $document_request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document_item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                <div class="i-docs">

                                                    <?php if($document_item->document_type == 'image'): ?>

                                                        <a target="_blank" href="<?php echo e($document_item['document_url']); ?>" >
                                                            <img class="img-100" src="<?php echo e($document_item['document_url']); ?>" name="request_document[]">
                                                        </a>

                                                    <?php elseif(in_array($document_item->document_type,['doc','xlsx','pdf','csv','ppt'])): ?>

                                                        <a href="<?php echo e($document_item['document_url']); ?>" target="_blank">
                                                            <img class="img-100" src="<?php echo e('/custom/image/'.$document_item->document_type.'.png'); ?>" name="request_document[]">
                                                        </a>

                                                    <?php else: ?>


                                                        <a href="<?php echo e($document_item['document_url']); ?>" target="_blank">
                                                            <img class="img-100" src="/custom/image/ic_files.png" name="request_document[]">
                                                        </a>

                                                    <?php endif; ?>

                                                    <input type="hidden" value="<?php echo e($document_item['document_url']); ?>" class="request-document"/>
                                                    <input type="hidden" value="<?php echo e($document_item['document_type']); ?>" class="document-type"/>
                                                    <input type="hidden" value="<?php echo e($document_item['document_id']); ?>" class="document-id"/>

                                                  
                                                        <a href="javascript:void(0)" onclick="deleteServiceDocument(this)"><i class="icons ic-del"></i></a>

                                                </div>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                        <?php endif; ?>



                                                <div class="i-docs">
                                                    <input type="file" name="image_<?php echo e($item->document_id); ?>" onchange="uploadServiceDocument(this,'<?php echo e($item->document_id); ?>')">
                                                    <input type="hidden" value="0" class="is_required_document"/>
                                                </div>


                                    </div>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                        <?php endif; ?>
                    </div>
                </form>
                <div>
                    <form>
                        <input <?php if($user->is_individual == 1): ?> checked="checked" <?php endif; ?> class="is_individual"  type="radio" name="is_individual" value="1" id="is_individual" style="margin-right: 5px"><label for="is_individual">Физическое лицо</label><br/>
                        <input <?php if($user->is_individual == 0): ?> checked="checked" <?php endif; ?> class="is_individual"  type="radio" name="is_individual" value="0" id="is_entity" style="margin-right: 5px"><label for="is_entity">Юридическое лицо</label>
                    </form>
                </div>

                <div class="box-footer">

                    <button type="button" class="btn btn-primary" onclick="saveUserDocument()">Сохранить</button>

                    <?php if($is_own == 1): ?>

                        <button id="confirm_btn" style="display: none" type="button" class="btn btn-success" onclick="sendToCheckDocument()">Отправить на проверку</button>

                    <?php else: ?>

                        <?php if($user->is_valid_document == 0): ?>
                            <button type="button" id="confirm_btn" class="btn btn-success" onclick="confirmUserDocument(1)">Подтвердить успешную верификацию</button>
                        <?php else: ?>
                            <button type="button"  id="confirm_btn" class="btn btn-success" onclick="confirmUserDocument(0)">Отменить успешную верификацию</button>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </section>
    <style>
        .item-docs {
            margin-bottom: 20px;
        }
        .item-docs > span {
            width: 165px;
            max-width: 100%;
            float: left;
        }
        .item-docs .input-box {
            margin-left: 180px;
        }
        .item-docs .i-docs {
            width: 85px;
            height: 85px;
            float: left;
            margin-right: 10px;
            margin-bottom: 10px;
            border-radius: 3px;
            border: solid 1px #ddd;
            background: #f8f8f8 url("/custom/image/add_img.png") no-repeat center/16px;
            position: relative;
        }
        .img-100 {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
        }
        .ic-del {
            background: url("/custom/image/ic_delete.png") no-repeat center/contain;
            width: 20px;
            height: 20px;
            position: absolute;
            top: -10px;
            right: -10px;
            cursor: pointer;
        }
        .icons {
            display: inline-block;
            vertical-align: middle;
        }
        .item-docs input[type="file"] {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            cursor: pointer;
            opacity: 0;
        }
        .document-list {
            padding-left: 30px;
            padding-top: 30px;
        }
    </style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>