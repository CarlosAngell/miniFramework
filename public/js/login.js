function login() {
    document.getElementById('loginForm').addEventListener('submit', function (e) {
        e.preventDefault(); // impede o redirecionamento

        const formData = new FormData(this);

        fetch('/login/authenticate', {
            method: 'POST',
            body: formData
        }).then(res => res.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/users';
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error("Erro geral:", error);
            });
    });
}

document.addEventListener("DOMContentLoaded", login, false);