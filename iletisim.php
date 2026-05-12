<?php include 'header.php'; ?>

    <div class="container mt-5" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white"><h3>İletişim Formu</h3></div>
                    <div class="card-body">
                        <form id="contactForm" action="gonder.php" method="POST">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Ad Soyad:</label>
                                    <input type="text" id="ad" name="ad" class="form-control" v-model="formData.ad" placeholder="Adınız">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">E-posta:</label>
                                    <input type="text" id="email" name="email" class="form-control" v-model="formData.email" placeholder="email@adres.com">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Telefon (Sadece Rakam):</label>
                                <input type="text" id="tel" name="tel" class="form-control" v-model="formData.tel" placeholder="05XXXXXXXXX">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Cinsiyet:</label><br>
                                <input type="radio" name="cinsiyet" value="Erkek" v-model="formData.cinsiyet"> Erkek
                                <input type="radio" name="cinsiyet" value="Kadın" v-model="formData.cinsiyet" class="ms-3"> Kadın
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Konu Seçiniz:</label>
                                <select name="konu" class="form-select" v-model="formData.konu">
                                    <option value="">Seçiniz...</option>
                                    <option value="Soru">Soru</option>
                                    <option value="Öneri">Öneri</option>
                                    <option value="İş Birliği">İş Birliği</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Mesajınız:</label>
                                <textarea name="mesaj" id="mesaj" class="form-control" rows="4" v-model="formData.mesaj"></textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="onay" v-model="formData.onay" required>
                                <label class="form-check-label" for="onay">Bilgilerin doğruluğunu onaylıyorum.</label>
                            </div>

                            <div class="d-flex gap-2">
                                <button type="button" class="btn btn-primary flex-fill" onclick="validateNative()">Native JS Denetle</button>
                                <button type="button" class="btn btn-success flex-fill" @click="validateVue">Vue.js Denetle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script>
        // 1. NATIVE JS DOĞRULAMA
        function validateNative() {
            const ad = document.getElementById('ad').value;
            const email = document.getElementById('email').value;
            const tel = document.getElementById('tel').value;
            const onayTiki = document.getElementById('onay').checked;
            const mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!ad || !email || !tel) {
                alert("Native JS: Lütfen zorunlu alanları (Ad, Email, Tel) doldurun!");
            } else if (!mailRegex.test(email)) {
                alert("Native JS: Email formatı hatalı!");
            } else if (isNaN(tel)) {
                alert("Native JS: Telefon sadece rakam olmalı!");
            } else if (!onayTiki) {
                alert("Native JS: Lütfen bilgilerin doğruluğunu onaylayın!");
            } else {
                alert("Native JS: Başarılı! Form gönderiliyor.");
                document.getElementById('contactForm').submit();
            }
        }

        // 2. VUE.JS DOĞRULAMA
        const { createApp } = Vue;
        createApp({
            data() {
                return {
                    formData: { ad: '', email: '', tel: '', cinsiyet: '', konu: '', mesaj: '', onay: false }
                }
            },
            methods: {
                validateVue() {
                    const mailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!this.formData.ad || !this.formData.email || !this.formData.tel) {
                        alert("Vue.js: Lütfen tüm alanları doldurun!");
                    } else if (!mailRegex.test(this.formData.email)) {
                        alert("Vue.js: Geçersiz Email!");
                    } else if (!this.formData.onay) {
                        alert("Vue.js: Lütfen onay kutusunu işaretleyin!");
                    } else {
                        alert("Vue.js: Form doğrulandı ve gönderiliyor.");
                        document.getElementById('contactForm').submit();
                    }
                }
            }
        }).mount('#app');
    </script>

<?php include 'footer.php'; ?>
