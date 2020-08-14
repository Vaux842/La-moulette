<!DOCTYPE html>

<html lang="fr">
    <head>
        <title>La moulette</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300;700&display=swap" rel="stylesheet">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header>
        <div><img src="img/logo_lamoulette.png"><h1>La Moulette</h1></div>
        <nav>
            <ul>
                <li><a href="#">Acceuil</a></li>
                <li><a href="Menu.html">Menu</a>
                    <ul>
                        <li><a href="">Entrée</a></li>
                        <li><a href="">Plat</a></li>
                        <li><a href="">Fromage</a></li>
                        <li><a href="">Desert</a></li>
                        <li><a href="">Boisson</a></li>
                    </ul>
                </li>
                <li><a href="">notre restaurant</a></li>
                <li><a href="">horaires</a></li>
                <li><a href="">contact</a></li>
            </ul>
        </nav>
        </header>
        <h1><?= "lilian" ?></h1>
        <section id="menu_of_the_day">
            <h2>Menu du jour</h2>
            <h3>Entrée</h3>
            <p>soupe a la moule</p>
            <h3>Plat</h3>
            <p>moule frite</p>
            <h3>Dessert</h3>
            <p>glace</p>
            <h3>Boisson</h3>
            <p>cocktail a la moule</p>
            <h3>25€</h3>
        </section>
        <div class="slider">
            <div class="sections">
                <section id="child-menu">
                    <h2>Menu enfant</h2>
                </section>
                <section id="view-on-the-sea">
                    <h2>Vue sur la mer</h2>
                </section>
                <section id="local-product">
                    <h2>Produits locaux</h2>
                </section>
            </div>
        </div>
        <footer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 300" >
        <path fill="#00ffff" fill-opacity="1" d="M0,128L34.3,138.7C68.6,149,137,171,206,160C274.3,149,343,107,411,112C480,117,549,171,617,160C685.7,149,754,75,823,69.3C891.4,64,960,128,1029,133.3C1097.1,139,1166,85,1234,64C1302.9,43,1371,53,1406,58.7L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path>
        </svg></footer>
    </body>
</html>