<?php require APPROOT . '/views/inc/header.php';?>
     <section id="register" class="py-2">
       <div class="container">
         <form action="<?php echo URLROOT; ?>/utilisateurs/inscription" method="POST" id="register-form">
             <?php flash('user_del_success'); ?>
          <h3 class="mb-1">Inscrivez-vous</h3>
           <div class="form-group">
             <label for="name">Nom<sup>*</sup></label>
             <input type="text" id="name" name="firstname" class="<?php echo (!empty($data['firstname_err'])) ? 'is-invalid' : '';?>" value="<?php echo $data['firstname']; ?>">
             <span class="invalid-feedback"><?php echo $data['firstname_err']?></span>
           </div>
           <div class="form-group">
             <label for="lastname">Prénom<sup>*</sup></label>
             <input type="text" id="lastname" name="lastname" class="<?php echo (!empty($data['lastname_err'])) ? 'is-invalid' : ''; ''?>" value="<?php echo $data['lastname']; ?>">
               <span class="invalid-feedback"><?php echo $data['lastname_err']; ?></span>
           </div>
           <div class="form-group">
             <label for="email">Email<sup>*</sup></label>
             <input type="email" name="email" id="email" class="<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
               <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
           </div>
           <div class="form-group">
            <label for="password">Mot de passe<sup>*</sup></label>
            <input type="password" name="password" id="password" class="<?php echo (!empty($data['password_err'])) ? 'is-invalid' : '' ;?>">
               <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
           </div>
           <div class="form-group">
             <label for="confpasword">Confirmer mot de passe<sup>*</sup></label>
             <input type="password" name="confirm_password" id="confpassword" class="<?php echo (!empty($data['confpass_err'])) ? 'is-invalid' : ''; ?>">
               <span class="invalid-feedback"><?php echo $data['confpass_err']; ?></span>
           </div>
             <div class="form-group">
                 <label for="bio">Intro ou bio</label>
                 <textarea name="bio" id="bio" class="<?php echo (!empty($data['bio_err'])) ? 'is-invalid' : ''; ?>" rows="2" ></textarea> <br>
                 <span class="invalid-feedback"><?php echo $data['bio_err']; ?></span>
             </div>
           <input type="submit" value="Inscrivez-vous" class="btn btn-primary">
         </form>
       </div>
     </section>

<?php require APPROOT . '/views/inc/footer.php';?>
