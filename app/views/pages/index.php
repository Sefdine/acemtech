<?php include APPROOT . '/views/inc/header.php';?>
      <!-- #Showcase -->
      <section id="showcase">
        <div class="container">
          <div class="showcase-container">
            <div class="showcase-content">
              <div class="category category-festivites">Festivites</div>
              <h1>Week-end Scientifique &amp; Culturel</h1>
              <p>L'Association des Comoriens Etudiant au Maroc (ACEM) est une association qui entre dans le cadre estudiantin, sociale, scientifique, culturel et aussi religieux. Depuis 2002, l' ACEM organise chaque année des activités scientifiques et culturelles dans le but de ...
              <div class="btn btn-primary"><a href="<?php echo URLROOT; ?>/wsc-marrakech-2022/" target="_blank"> En Savoir Plus</a></div>
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
                    $i = 1;
                    $j = 0;
                    foreach($data['posts'] as $post) { 
                    if($j < 5) {
                        if($i % 2 != 0)  { ?>

                            <article class="card bg-light">
                                <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>
                                 <div>
                                    <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                    <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>/<?php echo formatUrl($post->title);?>"><?php echo $post->title; ?></a></h3>
                                    <p>
                                        <?php 
                                          		echo $post->intro;
                                          //echo limit_text($post->body, 30); ?>
                                    </p>
                                     <small>Par <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, le<span class ="italic"> <?php formatDate($post->published_at); ?></span></small>
                                </div>
                            </article>
                        <?php } else { ?>
                            <article class="card bg-light">
                                <div>
                                    <div class="category <?php colors_category($post->category);?>"><?php echo $post->category; ?></div>
                                    <h3 class="article-heading"><a href="<?php echo URLROOT; ?>/posts/article/<?php echo $post->post_id; ?>/<?php echo formatUrl($post->title);?>"><?php echo $post->title; ?></a></h3>
                                    <p>
                                        <?php 
                                      			echo $post->intro;
                                      //echo limit_text($post->body, 30);?>
                                    </p>
                                    <small>Par <a href="<?php echo URLROOT; ?>/utilisateurs/profile/<?php echo $post->user_id; ?>"><strong><?php echo $post->firstname .' '. $post->lastname; ?></strong></a>, le <span class="italic"> <?php formatDate($post->published_at); ?></span></small>
                                </div>
                                <div class="card-bkgd-image" style='background-image: url("<?php echo URLROOT; ?>/storage/posts/<?php echo $post->img_name; ?>")'></div>

                            </article>

                    <?php }
                        }
                    $i++;
                    $j++;
                    }
                           
                    } ?>
                <?php if( count($data['posts']) > 5 ) : ?>
                <div id="pagination-button" class="text-center py-1">
                   <!-- <a href="javascript:void(0)" style="cursor: default;" title="précédent"><i class="fas fa-arrow-circle-left"></i></a> -->
                    <a href="<?php echo URLROOT; ?>/accueil/page/2" method="post" id="pagination-form" title="suivant"><i class="fa fa-angle-double-right"  aria-hidden="true"></i></a>
                </div>
                <?php endif; ?>
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
