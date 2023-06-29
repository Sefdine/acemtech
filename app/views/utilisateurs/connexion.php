<?php require APPROOT . '/views/inc/header.php';?>

<section id="login" class="py-2">
       <div class="container">
         <form action="<?php echo URLROOT; ?>/utilisateurs/connexion" method="POST" id="login-form">
             <?php flash('email_err'); ?>
           <?php flash('aucun_utilisateur'); ?>
           <?php flash('inscription_reussi'); ?>
           <h3 class="text-center">Connectez-vous</h3>
           <div class="form-group">
             <label for="email">Email</label>
             <input type="email" name="email" id="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>">
             <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
           </div>
           <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
           </div>
           <input type="submit" value="Connexion" class="btn btn-primary">
         </form>
       </div>
</section>

     <?php require APPROOT . '/views/inc/footer.php';?>
