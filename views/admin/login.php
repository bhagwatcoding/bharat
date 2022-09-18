<?php
$error = '';
if (isset($_POST['login'])):
  // select post data
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  // this is databse query then fetch data
  $db->select('users', '*', null, " (username = '{$username}' OR email = '{$username}') AND psd = '{$password}'");
  // result fetch and store result variable
  $result = $db->getResult();

if (count($result) > 0):
    foreach ($result as list('fname'=> $fname, 'lname'=> $lname, 'username' => $username)):
     $_SESSION['username'] = $username;
     $_SESSION['full_name'] = $fname . ' ' . $lname;

     setcookie('login', md5($username), time() + (86400 * 30), url::admin);
     Head::Loc('admin');
   endforeach;
else : $error =  '<div class="light-red fwb">'.$username. ' do not matched</div>'; endif;
endif;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="description" content="Here login Please">
    <link rel='shortcut icon' sizes='16x16' href='<?php echo base_url.'favicon.ico'; ?>' type='image/png' />
    <link rel="stylesheet" href="<?php echo base_url; ?>default.css" type="text/css">

<style type="text/css">
    body{
      height: 100vh;
    }
    .form{
      background-color: var(--smoke);
      border-radius: 5px;
      box-shadow: 0 0 5px 5px var(--light-gray);
    }
    .group{
      width: 350px;
      padding: 2rem;
    }
   .group .head{
      font-size: 2rem;
    }
    form .row{
      grid-template-rows: auto 1fr;
    }
    form input{
      width: 100%;
      padding: 0.7rem;
      border: 1px solid var(--light-gray);
    }

    form input:focus{
      outline: 2px solid var(--pink);
    }

    @media  screen and (max-width:600px) {
      body{
          height: auto;
      }
      .form{
        margin-top: 18vh;
        background-color: transparent;
        width: 100%;
        box-shadow: none;
        border: none;
      }
      .group{
        margin: auto;
        padding: 0;
        padding-bottom: 1rem;
      }
    }
    </style>
  </head>
  <body class="flex jcc aic">
      <form class="form oh" method="POST">
        <div class="group grid gap">
          <div class="head fwb tac">Login</div>
          <div class="row grid gap">
            <label for="username">username or email</label>
            <input type="text" name="username"  placeholder="username or email" maxlength="35" required>
          </div>
          <div class="row grid gap">
            <label>Password</label>
            <input type="password" name="password" placeholder="password" required>
            <label><?php echo $error; ?></label>
          </div>
          <div class="grid col row">
            <input class="bg-smoke fwb" type="submit" name="login" value="Login">
          </div>
        </div>
      </form>
    </body>
</html>
