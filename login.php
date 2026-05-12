<?php include 'header.php'; ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white text-center">
                        <h4>Öğrenci Girişi</h4>
                    </div>
                    <div class="card-body">
                        <form action="islem.php" method="POST" id="loginForm">
                            <div class="mb-3">
                                <label class="form-label">Kullanıcı Adı (Email):</label>
                                <input type="email" name="email" class="form-control" placeholder="b2512105XX@sakarya.edu.tr" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Şifre (Öğrenci No):</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
                        </form>
                        <?php if(isset($_GET['hata'])): ?>
                            <div class="alert alert-danger mt-3 text-center">Hatalı giriş veya boş alan!</div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>