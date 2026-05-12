<?php include 'header.php'; ?>

    <div class="container mt-5">
        <h2 class="text-center mb-4">İlgi Alanlarım: Oyun Dünyası</h2>
        <p class="text-center text-muted small">Bu veriler RAWG Video Games Database API üzerinden anlık çekilmektedir.</p>

        <div id="game-list" class="row g-4">
            <div id="loading-spinner" class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Yükleniyor...</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        const apiKey = '760773d366bc4246944062828784196d';
        const apiUrl = `https://api.rawg.io/api/games?key=${apiKey}&page_size=8&ordering=-added`;

        // API engellenirse veya bozulursa gösterilecek yedek liste
        const backupGames = [
            { name: "Valorant", released: "2020-06-02", rating: 4.5, background_image: "https://images.seeklogo.com/logo-png/37/1/valorant-logo-png_seeklogo-379976.png", genre: "FPS" },
            { name: "FiveM (GTA V Roleplay)", released: "2013-09-17", rating: 4.9, background_image: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTljHK0Vgim5wvBmGcoBiuAUIG3dKeHKS_FA&s", genre: "Roleplay" },
            { name: "Red Dead Redemption 2", released: "2018-10-26", rating: 4.9, background_image: "https://www.ireddead.com/content/images/large/rdr2-logo-1799.jpg", genre: "Action/Open World" },
            { name: "Counter-Strike 2", released: "2023-09-27", rating: 4.3, background_image: "https://tr.egw.news/_next/image?url=https%3A%2F%2Fegw.news%2Fuploads%2Fnews%2F1%2F17%2F1761205151884_1761205151885.webp&w=1920&q=75", genre: "FPS" }
        ];

        function displayGames(games) {
            const gameContainer = document.getElementById('game-list');
            gameContainer.innerHTML = '';

            games.forEach(game => {
                const genreName = game.genres ? game.genres[0]?.name : game.genre;
                const gameCard = `
                <div class="col-md-3">
                    <div class="card h-100 shadow-sm border-0">
                        <img src="${game.background_image}" class="card-img-top" alt="${game.name}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title fw-bold">${game.name}</h6>
                            <p class="card-text small text-muted mb-2">Çıkış: ${game.released}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-primary">Puan: ${game.rating}/5</span>
                                <small class="text-uppercase fw-bold" style="font-size: 0.7rem; color: #6c757d;">${genreName || 'Oyun'}</small>
                            </div>
                        </div>
                    </div>
                </div>
            `;
                gameContainer.innerHTML += gameCard;
            });
        }

        async function getGames() {
            try {
                const response = await fetch(apiUrl);
                if (!response.ok) throw new Error('API Yanıt Vermedi');
                const data = await response.json();
                displayGames(data.results);
            } catch (error) {
                console.warn("API verisi alınamadı, yedek liste yükleniyor:", error.message);
                displayGames(backupGames); // Hata durumunda yedek oyunları göster
            }
        }

        getGames();
    </script>

<?php include 'footer.php'; ?>