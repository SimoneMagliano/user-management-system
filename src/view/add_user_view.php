
    <?php include './src/view/head.php' ?> 
    <?php include './src/view/header.php' ?>
    
    <div class="container">
        <form action="add_user_form.php" method="POST">
            <div class="form-group">
               <label for="">Nome</label>
               <!-- is-invalid  -->
               <input
                value="<?= $firstName ?>" 
                class="form-control <?= $firstNameClass ?>"  
                name="firstName"  
                type="text">
               <div class="<?= $firstNameClassMessage ?>">
                  <?= $firstNameMessage ?>
               </div> 
            </div>
            <div class="form-group">
                <label for="">Cognome</label>
                <input class="form-control" name="lastName" type="text">
                <div class="invalid-feedback">
                    il cognome è obbligatorio
                </div> 
             </div>
             <div class="form-group">
                <label for="">email</label>
                <input class="form-control"  name="email" type="text"> 
                <div class="invalid-feedback">
                    email errata
                </div>
                <div class="invalid-feedback">
                    email obbligatoria
                </div>
             </div>
             <div class="form-group">
                <label for="">data di nascita</label>
                <input class="form-control" name="birthday" type="date">
             </div>
             <button class="btn btn-primary mt-3" type="submit">Aggiungi</button>
        </form>
    </div>
    
</body>
</html>