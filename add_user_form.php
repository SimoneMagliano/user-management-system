<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>
<body>
    <pre>
    <?php 
    echo "REQUEST_METHOD:";
    echo $_SERVER['REQUEST_METHOD']."\n";

    echo "POST \n";
    print_r($_POST);

    echo "GET \n";
    print_r($_GET);

    ?>
    </pre>
    <header>
            USM 
    </header>
    <div class="container">
        <form action="add_user_form.php" method="POST">
            <div class="form-group">
               <label for="">Nome</label>
               <!-- is-invalid  -->
               <input class="form-control" name="firstName"  type="text">
               <div class="invalid-feedback">
                   il nome è obbligatorio
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
                <input class="form-control" name="email" type="text"> 
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