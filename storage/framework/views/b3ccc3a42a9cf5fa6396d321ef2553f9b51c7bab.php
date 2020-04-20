<?php $__env->startSection('meta-tags'); ?>

    <title>Qpartners</title>
    <meta name="description" content="«Qpartners» - это уникальный медиа проект с широким набором возожностей для взаймодествия с участниками виртуального рынка" />
    <meta name="keywords" content="Qpartners" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div id="content" class="page-wrap sidebar-left">
        <div class="main-slider">
            <div class="item-slid">
                <img src="/slider1.jpeg?v=2" alt="">
                <div class="text-slid">
                   
                </div>
            </div>
            <div class="item-slid">
                <img src="/slider2.jpeg?v=2" alt="">
                <div class="text-slid">
                    
                </div>
            </div>
            <div class="item-slid">
                <img src="/slider3.jpeg?v=2" alt="">
                <div class="text-slid">
                    
                </div>
            </div>
            
        </div>
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div id="primary" class="content-area-front-page">
                        <main id="main" class="site-main" role="main">
                            <div class="entry-content">
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div class="vc_row wpb_row vc_row-fluid vc_custom_1496458166465">
                                    <div class="row_overlay" style=""></div>

                                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                        <div class="wpb_column vc_column_container vc_col-sm-4">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="themesflat_iconbox  inline-left transparent  vc_custom_1494487713818" >
                                                        <a href="/news/<?php echo e(\App\Http\Helpers::getTranslatedSlugRu($item['news_name_'.$lang])); ?>-u<?php echo e($item->news_id); ?>">
                                                            <div class="iconbox-image">
                                                                <img src="<?php echo e($item->news_image); ?>?width=370&height=230" alt="" />
                                                            </div>
                                                        </a>
                                                        <div class="iconbox-content">
                                                            <h5 class="title" style="">
                                                                <a href="/news/<?php echo e(\App\Http\Helpers::getTranslatedSlugRu($item['news_name_'.$lang])); ?>-u<?php echo e($item->news_id); ?>"><?php echo e($item['news_name_'.$lang]); ?></a>
                                                            </h5>
                                                            <p><?php echo e($item['news_desc_'.$lang]); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                                </div>
                           
                                <div class="vc_row wpb_row vc_row-fluid themesflat_1501148697">
                                    <div class="row_overlay" style=""></div>
                                    <div class="wpb_column vc_column_container vc_col-sm-12">
                                        <div class="vc_column-inner vc_custom_1491300752570">
                                            <div class="wpb_wrapper">
                                                <div class="title-section magb-28  ">
                                                    <h1 class="title">
                                                        Наши продукты
                                                    </h1>
                                                </div>
                                                <div class="themesflat-portfolio clearfix no">
                                                    <div class="portfolio-container  grid one-four show_filter_portfolio">

                                                        <?php $__currentLoopData = $project_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                            <div class="item travel-aviation ">
                                                                <div class="wrap-border">
                                                                    <a href="/project/<?php echo e(\App\Http\Helpers::getTranslatedSlugRu($item['project_name_'.$lang])); ?>-u<?php echo e($item->project_id); ?>">
                                                                        <div class="featured-post ">
                                                                                <img src="<?php echo e($item->project_image); ?>?width=270&height=200" alt="">
                                                                        </div>
                                                                    </a>
                                                                    <div class="portfolio-details">
                                                                        <div class="category-post">
                                                                            <a href="" rel="tag"></a>
                                                                        </div>
                                                                        <div class="title-post">
                                                                            <a href="/project/<?php echo e(\App\Http\Helpers::getTranslatedSlugRu($item['project_name_'.$lang])); ?>-u<?php echo e($item->project_id); ?>"><?php echo e($item['project_name_'.$lang]); ?></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                                <div class="vc_row-full-width vc_clearfix"></div>
                            </div><!-- .entry-content -->

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div><!-- /.col-md-12 -->

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(".main-slider").slick({
            arrows:true,
            dots:false,
            autoplay:true,
            autoplaySpeed:2000,
            speed:1200
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('index.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>