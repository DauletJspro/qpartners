<?php $__env->startSection('meta-tags'); ?>

    <title>Видео. Roiclub.kz</title>
    <meta name="description" content="Видео. Roiclub.kz - это группа единомышленников, которые уже имеют богатый опыт работы в МЛМ - индустрии, интернет-коммерции и обладают всеми необходимыми качествами для достижения поставленных целей" />
    <meta name="keywords" content="Видео, Roiclub.kz" />

<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>



    <!-- Page title -->
    <div class="page-title">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-title-container">
                    <h1>Видео галерея</h1>
                </div>
            </div>
        </div>
    </div>

    <div id="content" class="page-wrap fullwidth">
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-md-12">

                    <div id="primary" class="content-area fullwidth">
                        <main id="main" class="post-wrap" role="main">


                            <article id="post-149" class="post-149 page type-page status-publish hentry">


                                <div class="entry-content">
                                    <div class="vc_row wpb_row vc_row-fluid vc_custom_1493969740955">
                                        <div class="row_overlay" style=""></div>
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <div class="themesflat-faq-shortcodes grid one-half style-1 ">

                                                        <?php $__currentLoopData = $video; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                                            <div class="item video">
                                                                <div class="item-inner">
                                                                    <div class="featured-post">
                                                                        <div class="themesflat_video_embed"><a href="#"><img
                                                                                        src="/wp-content/uploads/2017/05/img-570x340.jpg"
                                                                                        class="attachment-themesflat-faq size-themesflat-faq wp-post-image"
                                                                                        alt="" width="570" height="340">
                                                                                <div class="themesflat_video_button"><i
                                                                                            class="fa fa-play"
                                                                                            aria-hidden="true"></i></div>
                                                                            </a>
                                                                            <iframe src="<?php echo e($item['video_text_'.$lang]); ?>"
                                                                                    allowfullscreen="" width="604"
                                                                                    height="340" frameborder="0"></iframe>
                                                                        </div>
                                                                    </div>
                                                                    <h2 class="faq-title"><a href="#"><?php echo e($item['video_name_'.$lang]); ?></a></h2>
                                                                </div>
                                                            </div>

                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>


                                                    </div>


                                                    <div class="col-md-12">
                                                        <?php echo e($video->appends(\Illuminate\Support\Facades\Input::except('page'))->links()); ?>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer">
                                </footer><!-- .entry-footer -->
                            </article><!-- #post-## -->


                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- /.col-md-12 -->


            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>


<?php $__env->stopSection(); ?>



<?php echo $__env->make('index.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>