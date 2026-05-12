GİRİŞ BİLGİLERİ (LOGIN)
Ödev gereksinimlerine uygun olarak hazırlanan sabit kullanıcı giriş bilgileri aşağıdadır:

Kullanıcı Adı: b251210564@sakarya.edu.tr
Şifre: b251210564

PROJE ÖZELLİKLERİ VE TEKNİK DETAYLAR

Dinamik Veri Çekme: "İlgi Alanlarım" sayfasında RAWG Video Games Database API kullanılarak oyun verileri anlık olarak çekilmektedir. API kısıtlaması veya bağlantı hatası durumunda "Yedek Liste" (Fallback) sistemi devreye girerek sayfanın boş kalmasını önler.

Form Doğrulama: İletişim formunda hem Native JavaScript hem de Vue.js ile istemci taraflı (client-side) veri doğrulaması yapılmıştır. Onay kutusu (checkbox) işaretlenmeden form gönderimi engellenmiştir.

Oturum Yönetimi: PHP session yapısı kullanılarak login kontrolü sağlanmış ve giriş yapan kullanıcı için özel karşılama mesajı eklenmiştir.

Responsive Tasarım: Site, Bootstrap 5 kullanılarak tüm cihazlarla (mobil, tablet, masaüstü) uyumlu hale getirilmiştir.
