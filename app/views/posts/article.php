<?php require APPROOT . '/views/inc/header.php';?>

<!-- #Article Page-->
<section id="article">
    <div class="container">
        <div class="page-container">
            <article class="card bg-light">
              	<?php
                	flash('no_post_error');
                	flash('post_update_success');
                  ?>
                <div class="bkgd-cover-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $data['post']->img_name; ?>")'></div>
                <span><small class="italic"><?php echo $data['post']->desc_img; ?></small></span>
                <h1 class="l-heading"><?php echo $data['post']->title; ?></h1>
                <div class="meta">
                    <small>
                        <i class="fas fa-user"></i>Ecrit par <span class="text-bold"><a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $data['user']->id; ?>"><?php echo $data['user']->firstname . ' ' . $data['user']->lastname;?></a></span><span class="hide">, <span class="date"><?php formatDateMin($data['post']->published_at); ?></span></span>
                    </small>
                    <!-- SHOW BUTTONS IF USER IS LOGGED IN -->
                    <?php if(!empty($_SESSION['user_id']) && $data['user']->id == $_SESSION['user_id']) : ?>
                    <div class="hide">
                        <a href="<?php echo URLROOT; ?>/posts/editer/<?php echo $data['post']->post_id; ?>" class="btn-sm">Editer</a>
                        <form class="inline" method="post" action="<?php echo URLROOT; ?>/posts/supprimer/<?php echo $data['post']->post_id; ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article? Suppression irreversible!')">
                            <input type="submit" name="supprimer" class="btn-sm text-red" value="Supprimer" title="Suppression irreversible">
                        </form>
                    </div>
                    <?php endif; ?>
                  
                  	<!-- Your share button code -->
                        <div class="fb-share-button" 
                        data-href="<?php echo URLROOT; ?>/posts/article/<?php echo $data['post']->post_id; ?>/<?php echo formatUrl($data['post']->title);?>" 
                        data-layout="button_count">
                        </div>
                  		<div id="fb-root"></div>

                    <div class="category <?php colors_category($data['post']->category);?>"><?php echo $data['post']->category; ?></div>
                </div>
                <div class="clearfix"></div>
                <div class="p-news mb-1">
                    <?php echo $data['post']->body; ?>
                </div>


                <div class="writer">
                    <?php if(!empty($data['user']->picture_name)) { ?>
                        <img class="img-scale" src="<?php echo URLROOT; ?>/storage/profiles/<?php echo $data['user']->picture_name; ?>" alt="">
                    <?php } else { ?>
                        <img id="profile-pic" src="<?php echo URLROOT; ?>/public/images/avatar.png" alt="">
                    <?php } ?>
                    <h3><a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $data['user']->id; ?>"><?php echo $data['user']->firstname . ' ' . $data['user']->lastname; ?></a></h3>
                    <p><?php echo $data['user']->bio; ?></p>
                </div>
            </article>

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

