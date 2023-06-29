<?php require APPROOT . '/views/inc/header.php';?>

<section class="dashboard">
    <div class="container py-2">
        <h1><?php echo $data['user']->firstname . ' ' . $data['user']->lastname; ?> Posts</h1>

        <div class="article-container py-1">
            <div class="articles">
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

                <small><div class="right-text">Membre depuis <?php formatDate($data['user']->created_at); ?></div></small>
                <div class="clearfix"></div>
                <p>
                    <small><div class="right-text">Introduction</div></small>
                <div class="bio">
                    <p><?php echo $data['user']->bio; ?></p>
                </div>
                </p>
            </div>
</section>
<div class="clearfix"></div>


<?php require APPROOT . '/views/inc/footer.php';?>

