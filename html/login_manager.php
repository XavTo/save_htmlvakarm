<?php
    function my_getpseudo($str)
    {
        $value = 0;
        $index = 0;
        $new = 0;
        $monfichier = fopen('save.txt', 'r+');
        $ligne = fgets($monfichier);
        fclose($monfichier);
        while (isset($ligne[$new])) {
            while (isset($str[$index]) && $ligne[$new] != '%') {
                if ($ligne[$new] != $str[$index])
                    $value++;
                $index++; $new++;
            }
            while ($ligne[$new] != '|')
                $new++;
            $new++;
            if ($value == 0)
                return (0);
            $value = 0; $index = 0;
        }
        return (1);
    }
    function my_getpass($str)
    {
        $str = hash("ripemd160", $str, $binary = false);
        $value = 0; $index = 0; $new = 0;
        $monfichier = fopen('save.txt', 'r+');
        $ligne = fgets($monfichier);
        fclose($monfichier);
        while ($ligne[$new] != '%') $new++;
        $new++;
        while (isset($ligne[$new])) {
            while (isset($str[$index]) && $ligne[$new] != '|') {
                if ($ligne[$new] != $str[$index]) $value++;
                $index++; $new++;
            }
            if ($ligne[$new] != '|' || isset($str[$index])) $value++;
            while (isset($ligne[$new]) && $ligne[$new] != '%') $new++;
            $new++;
            if ($value == 0) return (0);
            $value = 0; $index = 0;
        }
        return (1);
    }
    function my_checksame($str)
    {
        $value = 0;
        $new = 0;
        $index = 0;
        $monfichier = fopen('save.txt', 'r+');
        $ligne = fgets($monfichier);
        fclose($monfichier);
        while (isset($str[$index])) {
            while (isset($str[$index]) && $ligne[$new] != '%') {
                if ($ligne[$new] != $str[$index])
                    $value++;
                $index++; $new++;
            }
            while ($ligne[$new] != '|')
                $new++;
            $new++;
            if ($value == 0)
                return (1);
            $value = 0; $index = 0;
        }
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
        if (strlen($_POST['newpseudo']) < 2 || strlen($_POST['newpassword'] < 1))
            echo '<span class="loginerr">error</span>';
        else if (strlen($_POST['newpassword']) < 6)
            echo '<span class="loginerr"password to small</span>';
        else if (my_checksame($_POST['newpseudo']) == 1)
            echo '<span class="loginerr"Pseudo already taken</span>';
        else {
            $monfichier = fopen('save.txt', 'r+');
            $ligne = fgets($monfichier);
            fputs($monfichier, $_POST['newpseudo']."%".hash("ripemd160", $_POST['newpassword'], $binary = false)."|");
            fclose($monfichier);
            header("Refresh:0");
        }
    }
    if (isset($_POST['deco'])) {
        session_destroy();
        header("Refresh:0");
    }
?>