<?php require APPROOT . '/views/inc/header.php';?>

<!-- #About Page-->
<section id="resultat">
    <div class="container">
        <div class="page-container">
                <div class="articles">

                        <?php if(empty($data)) {  ?>
                        <div class="error-category">
                            <?php flash('keyword_not_found'); ?>
                        </div>
                        <?php } else { ?>
                        <?php foreach($data as $post) : ?>

                        <article class="card bg-light">
                            <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                            <div>
                                <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>"><?php echo $post->title; ?></a></h3>
                                <p>
                                    <?php echo limit_text($post->body, 26);
                                    ?>
                                </p>
                                <small><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>">Lire plus...</a></small>

                            </div>

                        </article>

                        <?php endforeach;?>
                    <?php } ?>
                </div>


            <div class="sidebar">
              
              <article class="card bg-green">
                <div class="category category-aides">Aides</div>
                <h3 class="article-heading"><a href="">Nous faire un don</a></h3>
                  Pour contribuer ou nous faire un don, veuillez nous contacter au:
                  <ul>
                    <br>
                    <li><i class="fas fa-envelope"></i> geeks@acem.tech</li>
                  </ul> 
                <a href="#" class="btn btn-block btn-secondary">Contribuez</a>
              </article>
              
              <?php require APPROOT . '/views/inc/smedia.php';?>

            </div>
        </div>
    </div>
</section>

<?php require APPROOT . '/views/inc/footer.php';?>

