<?php
include './conn.php';
$emailerror=false;
$passworderror=false;
$emailvalue='';
$passwordvalue='';
$successmsg=false;

if(isset($_POST['submit'])){
$successmsg=false;
$emailerror=false;
$passworderror=false;
$email=input($_POST['email']);
$password=input($_POST['password']);
$emailvalue=$email;
$passwordvalue=$password;
if(filter_var($email,FILTER_VALIDATE_EMAIL) && !empty($email)){
    if(strlen($password)>= 8 && !empty($password)){
        $sql='INSERT INTO `user`(`email`,`password`) VALUES (?,?)';
        $exc=$pdo->prepare($sql);
        $exc->execute(array($email,$password));
        $successmsg=true;

    }else{
    $passworderror=true; 
    }


}else{
    $emailerror=true;
}

}


function input($value){
    $newvalue=trim($value);
    $newvalue=htmlspecialchars($newvalue);
    $newvalue=stripslashes($newvalue);
    return $newvalue;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class='container'>
        <form method='post'>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control <?php if($emailerror) echo 'is-invalid' ?>" value='<?php echo $emailvalue ?>' id="exampleInputEmail1" name='email'>
            <div id="validationServeremailFeedback" class="invalid-feedback">
                email must be email type and it is not be empty
            </div>
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control <?php if($passworderror) echo 'is-invalid' ?>"  value='<?php echo $passwordvalue ?>' name="password" id="exampleInputPassword1">
            <div id="validationServeremailFeedback" class="invalid-feedback">
                password mube be 8 char or more.
            </div>
        </div>
        

        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </form>
    <br>
    <?php if($successmsg) echo '<div class="alert alert-success" role="alert">
  you add one record !!!
</div>' ?>
    </div>
</body>
</html>