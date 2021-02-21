<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>VaKarm.net</title>
        <link rel="stylesheet" href="newcss/vakar.css"/>
    </head>
    <body>
        <?php include("login_manager.php"); ?>
        <header>
            <h1><a class="linkvakarm" href="my_first.php" target="_blank"><span class="titlevakarm">Vakarm</span></a> 
                des news qui font du bruit
            </h1>
            <nav class="menu">
                <a href="https://www.vakarm.net/news">News</a>
                <a href="https://www.vakarm.net/forums">Forum</a>
                <a href="https://www.vakarm.net/videos">Vidéos</a>
                <a href="https://www.vakarm.net/dossiers">Dossiers</a>
            </nav>
        </header>
        <div id="conteneur">
            <section class="csmatch">
                <div class="namematch">Match incoming</div>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
                <span class="boxmatch">Astralis : NAVI <span class="hours">18:30</span></span>
            </section>
            <section class="article">
                <div class="namearticle">Articles :</div>
                <p class="listarticle">
                    Héritier souhaité des ESL Pro Series (EPS) d'antan, le Championnat National, ou ESL Championnat National (ECN) 
                    pour être précis, n'a jamais réellement atteint le statut de son ancêtre. Pourtant, malgré l'absence répétée – 
                    et logique tant le fossé entre professionnels et amateurs s'est creusé depuis plusieurs années – des meilleures 
                    équipes de l'Hexagone, il a tout de même su se faire une place sur la scène française, devenant un rendez-vous 
                    régulier pour le subtop, avec sa saison régulière en ligne et ses play-offs en lan (pour peu qu'une pandémie 
                    mondiale n'empêche pas leur tenue). Preuve en est de sa longévité, avec désormais 10 saisons au compteur en quatre 
                    ans et demi d'existence.
                </p>
            </section>
            <section class="competition">
                <div class="namecompet">Competiton à venir</div>
                <span class="listcompet">IEM Katowice<span class="date">18 Juillet 2021</span></span>
                <span class="listcompet">IEM Katowice<span class="date">18 Juillet 2021</span></span>
                <span class="listcompet">IEM Katowice<span class="date">18 Juillet 2021</span></span>
                <span class="listcompet">IEM Katowice<span class="date">18 Juillet 2021</span></span>
                <span class="listcompet">IEM Katowice<span class="date">18 Juillet 2021</span></span>
                <span class="listcompet">IEM Katowice<span class="date">18 Juillet 2021</span></span>
                <span class="listcompet">IEM Katowice<span class="date">18 Juillet 2021</span></span>
            </section>
            <section class="banniere">
                <div>
                    <img class="jackz" src="images/bannière.jpg" alt="Bannière">
                </div>
            </section>
        </div>
        <footer>
            <div class="otherlink">
                <a class="photo" href="http://twitter.com" target="_blank"><img class="shphoto" src="images/twi.png" alt="Twitter"></a>
                <a class="photo" href="http://youtube.com" target="_blank"><img class="shphoto" src="images/youtube.png" alt="Youtube"></a>
                <a class="photo" href="http://hltv.com" target="_blank"><img class="shphoto" src="images/hltv.png" alt="HLTV"></a>
                <a class="photo" href="http://twitch.com" target="_blank"><img class="shphoto" src="images/twitch.png" alt="Twitch"></a>
            </div>
        </footer>
    </body>
</html>