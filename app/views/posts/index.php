<?php require APPROOT . '/views/inc/header.php';?>

<section class="dashboard">
    <div class="container py-2">
        <h1>Vos Publications</h1>
        <div class=" article-container py-1">
            <?php
                flash('no_post_error');
                flash('post_update_success');
                flash('delete_success');
                flash('bio_success');
                flash('delete_error');
            ?>

        </div>
        <?php flash('no_post_error'); ?>
        <a href="<?php echo URLROOT; ?>/posts/ajouterarticle" class="btn btn-primary">Ajouter un article</a>
<!--        <p class="py-2">You don't have any post yet.</p>-->
        <br>

        <div class="article-container py-1">
            <div class="articles">
                <?php flash('post_success'); ?>

                <?php  if(!empty($data['posts'])) { foreach($data['posts'] as $post) : ?>

                <article class="card bg-light">
                    <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                    <div>
                        <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                        <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>"><?php echo $post->title; ?></a></h3>
                        <p class="mb-1">
                            <?php echo limit_text($post->body, 28); ?>
                        </p>
                            <small class="left-text"><?php formatDateMin($post->published_at); ?></small>

                        <a href="<?php echo URLROOT; ?>/posts/editer/<?php echo $post->post_id; ?>" class="btn-sm">Editer</a>
                        <form class="inline" method="post" action="<?php echo URLROOT; ?>/posts/supprimer/<?php echo $post->post_id; ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer cet article? Suppression irreversible!')">
                        <input type="submit" name="supprimer" class="btn-sm text-red" value="Supprimer" title="Suppression irreversible">
                        </form>
                    </div>
                </article>

                <?php endforeach; } ?>

        </div>

        <div class="sidebar mb-1">
            <?php if(!empty($data['user']->picture_name)) { ?>
                <img id="profile-pic" src="<?php echo URLROOT; ?>/storage/profiles/<?php echo $data['user']->picture_name; ?>" alt="">
            <?php } else { ?>
                <img id="profile-pic" src="<?php echo URLROOT; ?>/public/images/avatar.png" alt="">
            <?php } ?>
                <div class="clearfix"></div>

                    <div class="m-heading right-text"> <?php echo $data['user']->firstname; ?>  <?php echo $data['user']->lastname; ?>
            </div>

                <small><div class="right-text">Membre depuis <?php formatDate($_SESSION['user_joined_at']); ?></div></small>
            <div class="clearfix"></div>
            <p>
            <small><div class="right-text">Introduction</div></small>
                    <div class="bio">
                        <p><?php echo $data['user']->bio; ?></p>
                    </div>
                    <div class="clearfix"></div>
                    <form method="post" action="<?php echo URLROOT; ?>/utilisateurs/supprimerCompte/<?php echo $data['user']->id; ?>" class="right-text" onsubmit="return confirm('Voulez-vous vraiment supprimer votre compte? Toutes vos articles seront perdus!')">
                        <a href="<?php echo URLROOT; ?>/posts/editerBio/<?php echo $_SESSION['user_id']; ?>" clas="btn-sm">Modifier</a>
                        <input type="hidden" name="img-name" value="<?php echo $data['user']->picture_name; ?>">
                        <input class="btn-default mt-1 text-red" type="submit" value="Supprimer votre compte" title="Suprression définitive, vos articles seront perdus pour toujours">
                    </form>

                    <div class="clearfix"></div>
                </p>

        </div>
</section>
            <div class="clearfix"></div>




<?php require APPROOT . '/views/inc/footer.php';?>

