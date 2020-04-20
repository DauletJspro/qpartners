

    <?php $__currentLoopData = $row->packet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

        <?php if($item->is_portfolio == 0 && (($packet_type != 'share' && ($item->packet_thing != '' || $item->packet_lection != ''))  || ($packet_type == 'share' && $item->packet_share > 0))): ?>


                <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box packet-item-list" style="background-color: #<?php echo e($item->packet_css_color); ?>">
                    <div class="inner">
                        <h3 style="font-family: cursive; font-size: 30px"> <?php echo e($item->packet_name_ru); ?></h3>
                        <h4 style="font-size: 25px"><?php echo e($item->packet_price - $row['packet_old_price_'.$item->packet_id]); ?> $ (<?php echo e(($item->packet_price - $row['packet_old_price_'.$item->packet_id]) * \App\Models\Currency::where('currency_name','тенге')->first()->money); ?>тг) </h4>

                        <?php if($packet_type == 'share'): ?>
                            <?php if($item->packet_share > 0): ?>
                                <h4 style="font-size: 22px; font-weight: 800"><?php echo e($item->packet_share); ?> доля</h4>
                            <?php else: ?>
                                <h4 style="font-size: 22px; font-weight: 800">&ensp;</h4>
                            <?php endif; ?>
                        <?php elseif($packet_type == 'item'): ?>
                            <h4 style="font-size: 22px; font-weight: 800"><?php echo e($item->packet_thing); ?></h4>
                        <?php elseif($packet_type == 'service'): ?>
                            <h4 style="font-size: 22px; font-weight: 800"><?php echo e($item->packet_lection); ?></h4>
                        <?php endif; ?>

                        <input class="packet_type" type="hidden" value="<?php echo e($packet_type); ?>"/>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag" style="font-size: 40px"></i>
                    </div>

                    



                            <?php if($item->has_packet > 0): ?>
                                <?php if($item->is_active > 0): ?>
                                    <a class="small-box-footer shop_buy_btn" style="font-size: 18px">Вы уже приобрели</a>
                                <?php else: ?>
                                    <a href="javascript:void(0)" onclick="cancelResponsePacket(this,'<?php echo e($item->packet_id); ?>')" class="small-box-footer shop_buy_btn" style="font-size: 18px">Отменить запрос <i class="fa fa-arrow-circle-right"></i></a>
                                <?php endif; ?>
                            <?php else: ?>
                                <a href="javascript:void(0)" onclick="showBuyModal(this,'<?php echo e($item->packet_id); ?>')" class="buy_btn_<?php echo e($item->packet_id); ?> small-box-footer shop_buy_btn" style="font-size: 18px">Купить пакет <i class="fa fa-arrow-circle-right"></i></a>
                            <?php endif; ?>
                    

                    

                    <a href="javascript:void(0)" onclick="getReadMorePacket('<?php echo e($item->packet_id); ?>')" class="small-box-footer" style="font-size: 16px; text-decoration: underline; padding-top: 10px; background: rgba(0, 0, 0, 0.21) none repeat scroll 0px 0px;">Подробнее</a>
                </div>
            </div>

        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
