<?php $__env->startSection('meta-tags'); ?>

    <title>Галерея. Qpartners.kz</title>
    <meta name="description" content="Галерея. Qpartners.kz - это группа единомышленников, которые уже имеют богатый опыт работы в МЛМ - индустрии, интернет-коммерции и обладают всеми необходимыми качествами для достижения поставленных целей" />
    <meta name="keywords" content="Галерея, Qpartners.kz" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- Page title -->
    <div class="page-title">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-title-container">
                    <h1>Галерея</h1>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="page-wrap fullwidth">
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="themesflat-portfolio content-area">
                        <div class="themesflat-portfolio clearfix no">
                            <div class="portfolio-container  grid2 one-three show_filter_portfolio">

                                <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                    <div class="item travel-aviation ">
                                        <div class="wrap-border">
                                            <div class="featured-post ">
                                                <img src="<?php echo e($item->slider_image); ?>?width=370&height=270" alt=""></div>
                                            <div class="portfolio-details">
                                                <div class="category-post">

                                                </div>
                                                <div class="title-post">
                                                    <a><?php echo e($item['slider_name_'.$lang]); ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

                            </div>
                        </div>
                    </div><!-- /.portfolio-container -->


                </div><!-- /.col-md-12 -->


                <div class="col-md-12">
                    <?php echo e($gallery->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

                </div>

            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('index.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>