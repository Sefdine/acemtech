<?php include APPROOT . '/views/inc/header.php';?>
<!-- #Showcase -->
<section id="showcase">
    <div class="container">
        <div class="showcase-container">
            <div class="showcase-content">
                <div class="category category-festivites">Festivites</div>
                <h1>Journee Scientifique &amp; Culturelle</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa aperiam a sit ut dolore neque minima eius temporibus ullam! Impedit nobis rerum, recusandae tempora quaerat nemo reprehenderit soluta magnam excepturi</p>
                <div class="btn btn-primary"><a href="#"> En Savoir Plus</a></div>
            </div>
        </div>
    </div>
</section>
<!-- #Home Articles -->

<section class="dashboard">
    <div class="container pt-2">
        <h2>DERNIERES PUBLICATIONS</h2>
        <div class="article-container py-1">
            <div class="articles">
                <?php if (!empty($data)) {
                    foreach($data['posts'] as $post) :
                        if($post->counter %2 != 0)  { ?>

                              <article class="card bg-light">
                                <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                                 <div>
                                    <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                    <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>/<?php echo formatUrl($post->title); ?>"><?php echo $post->title; ?></a></h3>
                                    <p>
                                        <?php 
                                                     echo $post->intro;
                                                     //echo limit_text($post->body, 30); ?>
                                    </p>
                                     <small>Par <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong class="italic"><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, <?php formatDate($post->published_at); ?></small>
                                </div>
                            </article>
                        <?php } else { ?>
                            <article class="card bg-light">
                                <div>
                                    <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                    <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>/<?php echo formatUrl($post->title); ?>"><?php echo $post->title; ?></a></h3>
                                    <p>
                                        <?php 
                                      		echo $post->intro;
                                      	//echo limit_text($post->body, 30);?>
                                    </p>
                                    <small>Par <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong class="italic"><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, <?php formatDate($post->published_at); ?></small>
                                </div>
                                <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>

                            </article>

                        <?php } endforeach;
                } ?>
                <div id="pagination-button" class="text-center py-1">
                        <?php if($data['current_page'] > 2) { ?>
                             <a href="<?php echo URLROOT; ?>/accueil/page/<?php echo $data['current_page'] - 1;?>" title="précédent"><i class="fas fa-arrow-circle-left"></i></a>
                        <?php } else if($data['current_page'] == 2){ ?>
                            <a href="<?php echo URLROOT; ?>/accueil/" title="accueil"><i class="fa fa-angle-double-left"></i></a>

                        <?php } if($data['current_page'] < $data['total_pages']){ ?>
                        <a href="<?php echo URLROOT; ?>/accueil/page/<?php echo $data['current_page'] + 1 ;?>" title="suivant"><i class="fa fa-angle-double-right"></i></a>
                       <?php   } else if($data['current_page'] == $data['total_pages']){ ?>
                    <!--<a href="javascript:void(0)" title="Aucune page"><i class="fas fa-arrow-circle-right"></i></a>-->
                    <?php } ?>
                </div>
            </div>


            <div class="sidebar">
                <article class="card bg-dark">
                    <div class="category category-alaune">A La Une</div>
                    <h3 class="article-heading"><a href="https://ambacom-maroc.com/ambassadeur/" target="_blank">Ouverture de l'ambassade</a></h3>
                    <p>
                    L’Ambassade de l’Union des Comores au Maroc a été inaugurée, lundi 26 octobre 2020, lors d’une cérémonie organisée à Rabat.
                    Cette cérémonie a été présidée par le Ministre des Affaires Etrangères, de la Coopération Africaine et des Marocains 
                    Résidant à l’Etranger, S.E.M. Nasser Bourita et son homologue comorien, S.E.M. Dhoihir Dhoulkam. <a href="https://ambacom-maroc.com/ambassadeur/">Lire plus...</a>
                    </p>
                </article>
                <article class="card bg-light">
                    <div class="category category-communiques">Communiqués</div>
                   <!-- <img src="<?php echo URLROOT; ?>/public/images/publicites/elosig.png" alt="">-->
                    <h3 class="article-heading"><a href="https://ambacom-maroc.com/ova_sev/consulat-general-a-laayoune/">Consulat Général à Laayoune</a></h3>
                    <p>
                    La principale mission du Consulat Général de l’Union des Comores dans la Région Laayoune Sakia El Hamra est de :  
                      recenser et d’immatriculer les ressortissants comoriens résidant dans cette région marocaine ; 
                      de délivrer aux ressortissants comoriens ayant droit des documents de voyage, d’identité et d’acte d’état civil ;
                      <a href="https://ambacom-maroc.com/ova_sev/consulat-general-a-laayoune/" target="_blank">Voir plus</a>
                  </p>
                </article>
            </div>

</section>

<div class="clearfix"></div>

<?php include APPROOT . '/views/inc/footer.php';?>
