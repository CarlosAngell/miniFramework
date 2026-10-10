<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Meu Sistema' ?></title>

    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="<?= asset('css/style.css') ?>">
</head>

<body>

    <header>
        <h1>Sistema PHP Puro</h1>
        <nav>
            <a href="/">Início</a>
            <a href="/users">Usuários</a>
            <a href="/login">Login</a>
            <a href="/logout">Sair</a>
        </nav>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        <p>© <?= date('Y') ?> - Todos os direitos reservados.</p>
    </footer>

</body>

</html>