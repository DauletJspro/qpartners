<?php $__env->startSection('meta-tags'); ?>

    <title><?php echo e($news['news_name_'.$lang]); ?></title>
    <meta name="description" content="<?php echo e($news['news_name_'.$lang]); ?>. Qpartners.kz" />
    <meta name="keywords" content="Новости" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">

        <div class="breadcrumb-trail breadcrumbs">
            <span class="trail-browse"></span>
            <span class="trail-begin"></span>
            <span class="trail-end">&nbsp;</span>
        </div>
    </div>

    <div id="content" class="page-wrap sidebar-left">
        <div class="container content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div id="primary" class="">
                        <main id="main" class="post-wrap" role="main">


                            <article id="post-1053" class="post-1053 page type-page status-publish hentry">


                                <div class="entry-content">

                                    <div class="vc_row wpb_row vc_row-fluid themesflat_1501148752">
                                        <div class="row_overlay" style=""></div>
                                        <div class="wpb_column vc_column_container vc_col-sm-12">
                                            <div class="vc_column-inner ">
                                                <div class="wpb_wrapper">
                                                    <h1 style="letter-spacing: -1.01px; margin-bottom: 14px;"><?php echo e($news['news_name_'.$lang]); ?></h1>

                                                    <?php echo $news['news_text_'.$lang]; ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <footer class="entry-footer"></footer>
                            </article><!-- #post-## -->


                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div><!-- /.col-md-12 -->


            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- #content -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('index.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>