<?php if(!isset($first_user)): ?>
    <div class="top-line">л|п</div>
<?php endif; ?>

<div class="divide-part">
    <input type="hidden" value="<?php echo e($parent->level); ?>" class="circle-level"/>
    <input type="hidden" value="1" class="circle-level-<?php echo e($parent->level); ?>"/>
    <div class="left-part">
        <div class="left-line"></div>
        <div class="clear-float"></div>

        <?php $user = \App\Models\Users::where('parent_id',$parent->user_id)->where('is_left_part',1)->first(); ?>

        <?php if($user != null): ?>
             <?php echo view('admin.binar-structure.user-info',['user' => $user, 'main_user_id' => $main_user_id]); ?>


            <?php if($count < 5): ?>
                <?php echo view('admin.binar-structure.divide-line',['count' => $count + 1, 'parent' => $user, 'main_user_id' => $main_user_id]); ?>

            <?php else: ?>
                <div class="child-list">
                    <div class="show-bottom-structure" onclick="showChildList(this,'<?php echo e($user->user_id); ?>','<?php echo e($main_user_id); ?>')">
                        <i class="fa fa-plus-square red-color"></i>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <?php echo view('admin.binar-structure.empty-user-info',['parent_id' => $parent->user_id, 'is_left' => 1]); ?>

        <?php endif; ?>

    </div>
    <div class="right-part">
        <div class="right-line"></div>
        <div class="clear-float"></div>

        <?php $user = \App\Models\Users::where('parent_id',$parent->user_id)->where('is_left_part',0)->first(); ?>

        <?php if($user != null): ?>
            <?php echo view('admin.binar-structure.user-info',['user' => $user, 'main_user_id' => $main_user_id]); ?>


            <?php if($count < 5): ?>
                <?php echo view('admin.binar-structure.divide-line',['count' => $count + 1, 'parent' => $user, 'main_user_id' => $main_user_id]); ?>

            <?php else: ?>
                <div class="child-list">
                    <div class="show-bottom-structure" onclick="showChildList(this,'<?php echo e($user->user_id); ?>','<?php echo e($main_user_id); ?>')">
                        <i class="fa fa-plus-square red-color"></i>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <?php echo view('admin.binar-structure.empty-user-info',['parent_id' => $parent->user_id, 'is_left' => 0]); ?>

        <?php endif; ?>

    </div>
    <div class="clear-float"></div>
</div>

<?php if($count > 4): ?>
<!-- jQuery 2.1.4 -->
<script src="/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>

<script>
    $('.binary-structure').removeClass('full-width');
    $('.first-user').css('width', $(".left-line").width() + $(".right-line").width());
</script>

<?php endif; ?>
