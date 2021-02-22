<?php
    function my_getpseudo($str)
    {
        $index = 0;
        $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '');
        $pass = $bdd->query('SELECT pseudo FROM login ORDER BY id');
        while ($donnees = $pass->fetch()) {
            $stockarray[$index] = $donnees['pseudo'];
            $index++;
        }
        $index = 0;
        while (isset($stockarray[$index])) {
            if ($str == $stockarray[$index])
                return(0);
            $index++;
        }
        return (1);
    }
    function my_getpass($str)
    {
        $newstr = hash("ripemd160", $str, $binary = false);
        $index = 0;
        $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '');
        $pass = $bdd->query('SELECT password FROM login ORDER BY id');
        while ($donnees = $pass->fetch()) {
            $stockarray[$index] = $donnees['password'];
            $index++;
        }
        $index = 0;
        while (isset($stockarray[$index])) {
            if ($newstr == $stockarray[$index])
                return(0);
            $index++;
        }
        return (1);
    }
    function my_checksame($str)
    {
        $value = 0;
        $new = 0;
        $index = 0;
        $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '');
        $pass = $bdd->query('SELECT pseudo FROM login ORDER BY id');
        while ($donnees = $pass->fetch()) {
            $stockarray[$index] = $donnees['pseudo'];
            $index++;
        }
        $index = 0;
        while (isset($stockarray[$index])) {
            if ($str == $stockarray[$index])
                return(1);
            $index++;
        }
        return (0);
    }
?>
<?php
    if (isset($_SESSION['pseudo'])) {
        echo '<span class="login"> Welcome ' . $_SESSION['pseudo'] . '</span>';
        echo '<form class="formulaire" method="POST" action="vakarm.php">';
        echo '<input class="deco" type="submit" value="Disconnected" name="deco" id="deco">';
    }
    else {
        echo '<form class="formulaire" method="POST" action="vakarm.php">';
        echo '<label for="pseudo">Pseudo</label>';
        echo '<input class="enterpseudo" type="textbox" name="pseudo" id="pseudo" maxlength="10" placeholder="pseudo">';
        echo '<label class="labelpassword" for="password">Password</label>';
        echo '<input class="enterpassword" type="password" name="password" id="password" maxlength="8" placeholder="password">';
        echo '<input class="myvalid" type="submit" value="Login">';
        echo '</form>';
        echo '<form class="createaccount" method="POST" action="vakarm.php">';
        echo '<label for="pseudo">Pseudo</label>';
        echo '<input class="enterpseudo" type="textbox" name="newpseudo" id="newpseudo" maxlength="10" placeholder="pseudo">';
        echo '<label class="labelpassword" for="password">Password</label>';
        echo '<input class="enterpassword" type="password" name="newpassword" id="newpassword" maxlength="8" placeholder="password">';
        echo '<input class="validaccount" type="submit" value="Create account">';
        echo '</form>';
    }
    if (isset($_POST['pseudo']) && isset($_POST['password'])) {
        $ps = my_getpseudo($_POST['pseudo']);
        $pass = my_getpass($_POST['password']);
        if (strlen($_POST['pseudo']) < 2 || strlen($_POST['password']) < 2) {}
        else {
            if ($ps == 1 || $pass == 1)
                echo '<span class=erroruser">user unkown </span>';
            else {
                $_SESSION['pseudo'] = $_POST['pseudo'];
                $_SESSION['password'] = $_POST['password'];
                header("Refresh:0");
            }
        }
    }
    if (isset($_POST['newpseudo']) && isset($_POST['newpassword'])) {
        if (strlen($_POST['newpseudo']) < 2 || strlen($_POST['newpassword']) < 4 || my_checksame($_POST['newpseudo']) == 1) {
            if (my_checksame($_POST['newpseudo']) == 1) echo '<span class=erroruser">username already taken </span>';
            else echo '<span class=erroruser">password or username too small </span>';
        }
        else {
            $bdd = new PDO('mysql:host=localhost;dbname=users', 'root', '');
            $ret = $bdd->prepare('INSERT INTO login(pseudo, password) VALUES (:pseudo, :password)');
            $ret->bindValue(':pseudo', $_POST['newpseudo'], PDO::PARAM_STR);
            $ret->bindValue(':password', hash("ripemd160", $_POST['newpassword'], $binary = false), PDO::PARAM_STR);
            $ret->execute();
        }
    }
    if (isset($_POST['deco'])) {
        session_destroy();
        header("Refresh:0");
    }
?>