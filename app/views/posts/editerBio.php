<?php require APPROOT . '/views/inc/header.php';?>

<section class="dashboard">
    <div class="container py-2">
        <h1>Vos Publications</h1>
        <div class=" article-container py-1">
            <?php
            flash('no_post_error');
            flash('post_update_success');
            flash('delete_success');
            flash('delete_error');
            flash('file_size_error');
            flash('file_format_error');
            flash('file_exist_error');
            flash('file_upload_error');
            flash('file_input_error');
            flash('input_img_error');
            ?>

        </div>
        <?php flash('no_post_error'); ?>
        <a href="<?php echo URLROOT; ?>/posts/ajouterarticle" class="btn btn-primary">Ajouter un article</a>
        <!--        <p class="py-2">You don't have any post yet.</p>-->
        <br>

        <div class="article-container py-1">
            <div class="articles">
                <?php flash('post_success'); ?>

                <?php foreach($data['posts'] as $post) : ?>

                    <article class="card bg-light">
                        <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                        <div>
                            <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                            <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>"><?php echo $post->title; ?></a></h3>
                            <p class="mb-1">
                                <?php echo limit_text($post->body, 28); ?>
                            </p>
                            <!--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis incidunt ipsum minima nam nobis praesentium veritatis.</p>-->
                            <small class="left-text"><?php formatDateMin($post->published_at); ?></small>


                            <form class="inline" method="post" action="<?php echo URLROOT; ?>/posts/supprimer/<?php echo $post->id; ?>">
                                <a href="<?php echo URLROOT; ?>/posts/editer/<?php echo $post->id; ?>" class="btn-sm">Editer</a>
                                <input type="submit" name="supprimer" class="btn-sm text-red" value="Supprimer" title="Suppression irreversible">
                            </form>
                        </div>
                    </article>

                <?php endforeach; ?>

            </div>

            <div class="sidebar mb-1">
                <form action="<?php echo URLROOT; ?>/posts/editerBio/<?php echo $_SESSION['user_id']; ?>" method="post" enctype="multipart/form-data" id="form-editerBio">
                <?php if(!empty($data['user']->picture_name)) { ?>
                    <img id="profile-pic" src="<?php echo URLROOT; ?>/storage/profiles/<?php echo $data['user']->picture_name; ?>" alt="">
                <?php } else { ?>
                    <img id="profile-pic" src="<?php echo URLROOT; ?>/public/images/avatar.png" alt="">
                 <?php } ?>
                    <input type="hidden" name="old_img" value="<?php echo $data['user']->picture_name; ?>">
                <div class="align-right">
                    <input type="file" name="profile_image" id="" class="align-right">
                </div>

                <div class="clearfix"></div>


                <div class="py-1 form-group right-text">

                    <small><span class="invalid-feedback"><?php if(!empty($data['fname_err'])) echo $data['fname_err']; ?></span></small>
                    <input type="text" name="fname" id="fname" value="<?php if(!empty($data['user']->firstname)) echo $data['user']->firstname; ?>">

                    <small><span class="invalid-feedback"><?php if(!empty($data['lname_err'])) echo $data['lname_err']; ?></span></small>
                    <input type="text" name="lname" id="lname" value="<?php if(!empty($data['user']->lastname)) echo $data['user']->lastname; ?>" class="mt-1">
                </div>

                <small><div class="right-text">Membre depuis <?php formatDate($_SESSION['user_joined_at']); ?></div></small>
                <div class="clearfix"></div>
                <p>
                    <small><div class="right-text">Introduction</div></small>

                    <small><span class="invalid-feedback"><?php if(!empty($data['bio_err'])) echo $data['bio_err']; ?></span></small>
                    <textarea class="bio" name="bio" id="bio" cols="40" rows="10">
                       <?php echo $data['user']->bio; ?>
                    </textarea>

                    <a href="<?php echo URLROOT; ?>/posts/index">Annuler</a>
                    <input class="btn-default mt-1 mx-1" type="submit" value="Valider">
                </form>

                <div class="clearfix"></div>
                </p>

            </div>
</section>
<div class="clearfix"></div>




<?php require APPROOT . '/views/inc/footer.php';?>

