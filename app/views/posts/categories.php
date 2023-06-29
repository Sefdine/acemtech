<?php require APPROOT . '/views/inc/header.php';?>

<!-- #Article Page-->
<section class="dashboard" id="categorie">
    <div class="container">
        <div class="page-container">

            <div class="articles">
                <?php if (!empty($data)) {
                    foreach($data as $post) : ?>

                        <article class="card bg-light">
                            <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                            <div>
                                <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>"><?php echo $post->title; ?></a></h3>
                                <p>
                                    <?php 
                                    echo limit_text($post->body, 26);
                                    ?>
                                </p>
                                <small><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>">Lire plus...</a></small>

                            </div>

                        </article>

                    <?php endforeach;
                } else { ?>
                    <div class="error-category">
                        <?php echo flash('no_category'); ?>
                    </div>

                 <?php } ?>

            </div>


            <div class="sidebar">
              <?php
              	require APPROOT . '/views/inc/categorie.php'; 
              	require APPROOT . '/views/inc/smedia.php';
              
              ?>
            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php';?>














