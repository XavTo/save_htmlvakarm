<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>My First since a long time</title>
        <link rel="stylesheet" href="newcss/style.css" />
    </head>
    <body>
        <header><h1 class="First_title">
            <?php
                if (isset($_GET['nom'])) {
                    if (ctype_alpha($_GET['nom']) == false) echo "error name or no login";
                    else echo "bonjour " . $_GET['nom'];
                }
                else header('Location: error.php');
            ?>
            </h1></header>
        <h2 class="Title_article">Paris win barcelona !</h2>
        <div id="box">
            <div class="match">
                <span class="incoming">Match incoming</span>
                <ul>
                    <li class="cmatch"> Paris : Manchester</li>
                    <li class="cmatch">Barcelone : Marseille</li>
                    <li class="cmatch">Naple : Bayern</li>
                </ul>
            </div>
            <article><p class="contenue">this night, paris beat barcelona <strong>Mbappe</strong> make a triple and make a very great <em>match</em></p>
            <ol class="buteur">
                <li class="Paris">Mbappe 78min</li>
                <li class="Paris">Dimario 54min</li>
                <li class="Barca">Pessi Penalty</li>
            </ol>
            </article>
            <div class="old"><span class="old_article">List of old article</span>
                <ul class="other_match">
                    <li class="annotli">Marseille paris <a href="https://lequipe.fr">big clash </a></li>
                    <li class="annotli">Bordeau Rennes <a href="https://eurosport.com"> match chiant</a></li>
                    <li class="annotli">Bayern Dortmuntd <a href="https://youtube.com"> derby allemand</a></li>
                </ul>
            </div>
        </div>
        <p class="my_google"> You can see <span class="important">this</span> on <a href="https://google.com" title="lourd" target="_blank">google</a></p>
        <footer>
        <figure>
            <a href="images/epi.png"><img src="images/liepi.png" alt="epitech" title="mon ecole"/></a>
            <figcaption>Logo de l'école</figcaption>
        </figure>
        </footer>
    </body>
</html>