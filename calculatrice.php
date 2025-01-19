<?php
$cookie_name1 = "num";
$cookie_value1 = "";
$cookie_name2 = "op";
$cookie_value2 = "";

if (isset($_POST['num'])) {
    if ($_POST['num'] == 'C') {
        $num = "";
    } else {
        $num = $_POST['input'] . $_POST['num'];
    }
} elseif (isset($_POST['equal'])) {
    $num = $result;
} else {
    $num = "";
}

if (isset($_POST['op'])) {
    $cookie_value1 = $_POST['input'];
    setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/");

    $cookie_value2 = $_POST['op'];
    setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/");
    $num = "";
}

if (isset($_POST['equal'])) {
    $num = $_POST['input'];
    if (isset($_COOKIE['num']) && isset($_COOKIE['op'])) {
        switch ($_COOKIE['op']) {
            case '+':
                $result = $_COOKIE['num'] + $num;
                break;
            case '-':
                $result = $_COOKIE['num'] - $num;
                break;
            case '*':
                $result = $_COOKIE['num'] * $num;
                break;
            case '/':
                if ($num == 0) {
                    $result = "Erreur : division par 0";
                } else {
                    $result = $_COOKIE['num'] / $num;
                }
                break;
            case '%':
                $result = $_COOKIE['num'] % $num;
                break;
            default:
                $result = "Opération inconnue";
        }
        $num = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculatrice</title>
    <link rel="stylesheet" href="calculatrice.css" />
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar">
            <ul>
                <li><a href="https://abbadessa-dorian.fr/">Portfolio</a></li>
                <li><a href="calculatrice.php">Calculatrice</a></li>
            </ul>
            <!-- Réseaux sociaux -->
            <div class="social">
                <ul>
                    <li><a href="https://www.linkedin.com/in/dorian-abbadessa/"><img src="linkedin.png" alt="linkedin" /></a></li>
                    <li><a href="https://github.com/DorianABDS" target="_blank"><img src="github.png" alt="github" /></a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <!-- Calculatrice -->
        <div class="calc">
            <!-- Formulaire de la calculatrice -->
            <form class="form" action="" method="post">
                <br />
                <!-- Input d'affichage -->
                <input
                    type="text"
                    class="maininput"
                    name="input"
                    value="<?php echo @$num ?>" />
                <br />
                <br />
                <!-- Clavier de la calculatrice -->
                <input type="submit" class="calbtn" name="op" value="%" />
                <input type="submit" class="calbtn" name="op" value="/" /> <br>
                <input type="submit" class="numbtn" name="num" value="7" />
                <input type="submit" class="numbtn" name="num" value="8" />
                <input type="submit" class="numbtn" name="num" value="9" />
                <input type="submit" class="calbtn" name="op" value="*" /> <br />
                <input type="submit" class="numbtn" name="num" value="4" />
                <input type="submit" class="numbtn" name="num" value="5" />
                <input type="submit" class="numbtn" name="num" value="6" />
                <input type="submit" class="calbtn" name="op" value="-" /> <br />
                <input type="submit" class="numbtn" name="num" value="1" />
                <input type="submit" class="numbtn" name="num" value="2" />
                <input type="submit" class="numbtn" name="num" value="3" />
                <input type="submit" class="calbtn" name="op" value="+" /> <br />
                <input type="submit" class="c" name="num" value="C" />
                <input type="submit" class="numbtn" name="num" value="0" />
                <input type="submit" class="numbtn" name="num" value="." />
                <input type="submit" class="equal" name="equal" value="=" />
            </form>
        </div>
        <footer>
            <p>© 2021 - Dorian ABBADESSA</p>
        </footer>
    </main>
</body>

</html>