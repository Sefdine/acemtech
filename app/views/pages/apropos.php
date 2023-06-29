<?php require APPROOT . '/views/inc/header.php';?>

      <!-- #About Page-->
      <section id="about">
        <div class="container">
          <?php flash('mail_sent'); ?>
          <?php flash('mail_error'); ?>
          <div class="page-container">
            <div class="about card bg-light">
              <?php flash('mail_sent'); ?>
              <?php flash('mail_error'); ?>
              <div class="p-news">
                <article>
                  <h1 class="text-primary">A PROPOS D'ACEM TECH</h1>
                  <p>L’<span class="text-bold">ACEM TECH</span> est une solution innovante qui a pour but de garantir l’enrichissement et la valorisation des <span class="text-bold">projets innovants, de cultiver l’esprit d’innovation, développer et faciliter l’esprit d’épanouissement.</span></p>

                  <p>Cette plateforme a pour objectif :</p>
                
                  <ul>
                    <li class="text-indent"><i class="fas fa-check-circle"></i> De rendre visible et accessible des <span class="italic underline">projets et recherches éditées par des étudiants comoriens</span> à but non lucratif, toutes disciplines confondues (sciences exactes et naturelles, sciences humaines et sociales…).</li><br>
                    <li class="text-indent"><i class="fas fa-check-circle"></i> De diffuser des ressources documentaires et archivistiques et fournit l’expertise et les outils pour répondre aux besoins d’information de sa communauté.</li><br>
                  </ul>

                  Sous la responsabilité d'un membre du bureau Exécutif de l’ACEM, L’ACEM TECH, assume notamment les responsabilités suivantes :

                  <ul><br>
                    <li class="text-indent"><i class="fas fa-check-circle"></i> Favoriser l’avancement et la diffusion du savoir, en soutien à l’enseignement et à la recherche, en développant des collections sous tous les formats et en offrant l’accès à distance. </li><br>

                    <li class="text-indent"><i class="fas fa-check-circle"></i> Participer à la réussite étudiante en collaborant avec le personnel enseignant au développement des compétences informationnelles des étudiantes et des étudiants.</li><br>

                    <li class="text-indent"><i class="fas fa-check-circle"></i> Assurer l’acquisition, l’organisation et la conservation des documents incluant des fonds d’archives privées.</li><br>

                    <li class="text-indent"><i class="fas fa-check-circle"></i> Développer des services et des outils technologiques facilitant la découverte de l’information et de la documentation sous tous les formats.</li><br>

                    <li class="text-indent"><i class="fas fa-check-circle"></i> Offrir à l’ensemble de la communauté universitaire les ressources nécessaires pour l’utilisation des œuvres d’autrui dans le respect de la législation sur le droit d’auteur. </li><br>
                    <li class="text-indent"><i class="fas fa-check-circle"></i> Gérer et planifier des espaces stimulants qui répondent à l’évolution des besoins de la communauté universitaire.</li>
                  </ul>
              </article>

                <article>
                  <h1 class="text-primary">A PROPOS DE L'ACEM MAROC</h1>
                  <p>L' association des comoriens étudiant au Maroc (<span class="text-bold">ACEM</span>) est une association qui entre dans le cadre estudiantin, sociale, scientifique, culturel et aussi religieux. Depuis 2002, l' ACEM organise chaque année des activités scientifiques et culturelles dans le but de sensibliser le maximum possible tous les étudiants comoriens se trouvant dans l'ensemble du royaume. Parmi ces activités, on distingue la journée culturelle scientifique. Cette dernière est la plus éminente de toutes par son envergure et son importance auprès de tout un chacun.</p>
                </article>
                <article>
                  <h1 class="text-primary">VOUS ETES DEVELOPPEUR, WEBMASTER? VOULEZ-VOUS AIDER, CONTRIBUEZ?</h1>
                  <p>Si vous pensez être capable de nous aider à améliorer le projet par tout les moyens possibles, merci de nous contacter via mail: <span class="bold italic text-bold">geeks@acem.tech</span>.<br>
                  Etant un projet purement open source, vous pourrez contribuer au<a href="https://github.com/acemtech/acemtech"> projet sur GitHub</a>.<br>
                  Vous pouvez lire les détails concernant comment y contribuer sur ce <a href="http://acem.tech/posts/article/2">lien</a>.</p>
                </article>

              </div>
            </div>

            <div class="sidebar">
              <article class="card bg-green">
                <div class="category category-aides">Aides</div>
                <h3 class="article-heading"><a href="">Nous faire un don</a></h3>
                <p>
                  Pour contribuer ou nous faire un don, veuillez nous contacter au:
                  <ul>
                    <li><i class="fas fa-envelope"></i> geeks@acem.tech</li>
                  </ul> 
                </p>
                <a href="#" class="btn btn-block btn-secondary">Contribuez</a>
              </article>

              <?php require APPROOT . '/views/inc/smedia.php'; ?>
            </div>
          </div>
        </div>
      </section>

      <?php require APPROOT . '/views/inc/footer.php';?>

