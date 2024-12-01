<!-- Default display template !-->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zoo</title>
    <script defer src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../assets/js/script.js"></script>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <header>
        <nav>
            <span><a href="/">Accueil</a></span>
            <span><a href="/animal">Gestion des animaux</a></span>
        </nav>
    </header>
    
    <main>
        <?= $data['content'] ?>
    </main>
</body>

</html>