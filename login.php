<style>
.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 90vh;
}

.login-card {
    background: #ffffff;
    padding: 30px 35px;
    width: 360px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
</style>

<div class="login-container">
    <form action="process_login.php" method="POST" class="login-card">
        <h2>Login</h2>

        <label>Email atau Username</label>
        <input type="text" name="email" placeholder="Masukkan email atau username" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Masukkan password" required>

        <button type="submit">Login</button>

        <p>Belum punya akun? <a href="index.php?page=register">Register di sini</a></p>
    </form>
</div>
<link rel="stylesheet" href="style.css?v=4">