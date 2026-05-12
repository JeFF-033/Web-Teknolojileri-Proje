<?php include 'header.php'; ?>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center">
                <h3>İletişim Formu Mesaj Bilgileri</h3>
            </div>
            <div class="card-body">
                <p class="text-muted text-center">Aşağıdaki bilgiler PHP sunucu tarafında işlenerek ekrana yansıtılmıştır.</p>
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Ad Soyad:</th>
                        <td><?php echo isset($_POST['ad']) ? htmlspecialchars($_POST['ad']) : 'Belirtilmedi'; ?></td>
                    </tr>
                    <tr>
                        <th>E-posta:</th>
                        <td><?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : 'Belirtilmedi'; ?></td>
                    </tr>
                    <tr>
                        <th>Telefon:</th>
                        <td><?php echo isset($_POST['tel']) ? htmlspecialchars($_POST['tel']) : 'Belirtilmedi'; ?></td>
                    </tr>
                    <tr>
                        <th>Mesaj:</th>
                        <td><?php echo isset($_POST['mesaj']) ? nl2br(htmlspecialchars($_POST['mesaj'])) : 'Mesaj yok'; ?></td>
                    </tr>
                </table>
                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-primary">Ana Sayfaya Dön</a>
                </div>
            </div>
        </div>
    </div>

<?php include 'footer.php'; ?>