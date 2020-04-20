<div title="<?php echo e($user->last_name); ?> <?php echo e($user->name); ?>" class="quadrate <?php if($user->status_id == null): ?> yellow-square <?php elseif($user->is_activated == 0): ?> red-square <?php elseif($user->status_id == 1): ?> violet-square <?php elseif($user->status_id == 2): ?> orange-square <?php elseif($user->status_id == 3): ?> blue-square <?php elseif($user->status_id == 12): ?> start-square <?php elseif($user->status_id > 3): ?> pink-square <?php else: ?> green-square <?php endif; ?>  <?php if($user->recommend_user_id == $main_user_id): ?> binary-circle <?php endif; ?>">
    <div class="left_volume"><?php echo e($user->left_child_profit); ?></div>
    <div class="user_id"><?php echo e($user->user_id); ?></div>
    <div class="right_volume"><?php echo e($user->right_child_profit); ?></div>
</div>

<?php if(isset($first_user)): ?>
    <div class="top-line">л|п</div>
<?php endif; ?>