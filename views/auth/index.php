<h2><?= $title ?? 'Login' ?></h2>
<script src="<?= asset('js/login.js') ?>"></script>
<form action="/login/authenticate" method="POST" id="loginForm">
    <label>Email:</label>
    <input type="text" name="email">

    <label>Senha:</label>
    <input type="password" name="password">

    <button type="submit" onclick="login">Entrar</button>
</form>