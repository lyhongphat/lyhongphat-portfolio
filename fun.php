<?php
// Just 4 Fun Page
global $lang, $current_lang;
?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($current_lang); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang['fun_title']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .fun-container {
            padding-top: 120px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            background: radial-gradient(circle at top right, rgba(100, 255, 218, 0.05), transparent),
                        radial-gradient(circle at bottom left, rgba(100, 255, 218, 0.05), transparent);
        }
        .weather-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 40px;
            width: 90%;
            max-width: 600px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            position: relative;
            overflow: hidden;
        }
        .weather-info h2 {
            font-size: 3rem;
            margin: 10px 0;
            color: var(--accent);
        }
        .weather-info p {
            font-size: 1.2rem;
            color: var(--text-light);
        }
        .music-recommendation {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: none; /* Shown after weather fetch */
        }
        .music-recommendation h4 {
            color: var(--accent);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 15px;
        }
        .recommendation-box {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            background: rgba(100, 255, 218, 0.1);
            padding: 15px 20px;
            border-radius: 12px;
            text-decoration: none;
            color: white;
            transition: transform 0.3s ease;
        }
        .recommendation-box:hover {
            transform: scale(1.02);
            background: rgba(100, 255, 218, 0.15);
        }
        .music-section {
            width: 90%;
            max-width: 800px;
            text-align: center;
        }
        .music-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        .music-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            transition: transform 0.3s ease;
        }
        .music-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.05);
        }
        .music-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
        }
        .back-btn {
            margin-top: 50px;
            margin-bottom: 50px;
        }
        #weather-loading {
            font-style: italic;
            opacity: 0.7;
        }
        .fun-lang-switcher {
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
        }
        .fun-lang-switcher a {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }
        .fun-lang-switcher a.active {
            color: var(--accent);
        }
    </style>
</head>
<body>
    <div class="fun-container">
        <div class="fun-lang-switcher">
            <a href="?lang=en" class="<?php echo $current_lang === 'en' ? 'active' : ''; ?>">EN</a>
            <a href="?lang=ja" class="<?php echo $current_lang === 'ja' ? 'active' : ''; ?>">JA</a>
            <a href="?lang=ko" class="<?php echo $current_lang === 'ko' ? 'active' : ''; ?>">KO</a>
            <a href="?lang=vi" class="<?php echo $current_lang === 'vi' ? 'active' : ''; ?>">VI</a>
        </div>

        <div class="weather-card glassmorphism">
            <h3 style="color: var(--text-light); font-size: 0.9rem; text-transform: uppercase; letter-spacing: 2px;"><?php echo $lang['fun_weather_title']; ?></h3>
            <div id="weather-content">
                <p id="weather-loading"><?php echo $lang['fun_weather_loading']; ?></p>
            </div>
            
            <div id="music-recommendation" class="music-recommendation">
                <h4><?php echo $lang['fun_recommendation']; ?></h4>
                <a id="recommendation-link" href="#" target="_blank" class="recommendation-box">
                    <span style="font-size: 1.5rem;">🎵</span>
                    <span id="recommendation-text">Loading suggestion...</span>
                </a>
            </div>
        </div>

        <div class="music-section">
            <h2 class="section-title type-effect"><?php echo $lang['fun_music_title']; ?></h2>
            <p style="color: var(--text-light);"><?php echo $lang['fun_music_desc']; ?></p>
            
            <div class="music-grid">
                <div class="music-card">
                    <div class="music-icon">🎸</div>
                    <h3><?php echo $lang['fun_music_lofi_title']; ?></h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);"><?php echo $lang['fun_music_lofi_desc']; ?></p>
                </div>
                <div class="music-card">
                    <div class="music-icon">🎹</div>
                    <h3><?php echo $lang['fun_music_classical_title']; ?></h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);"><?php echo $lang['fun_music_classical_desc']; ?></p>
                </div>
                <div class="music-card">
                    <div class="music-icon">🎧</div>
                    <h3><?php echo $lang['fun_music_synth_title']; ?></h3>
                    <p style="font-size: 0.9rem; color: var(--text-light);"><?php echo $lang['fun_music_synth_desc']; ?></p>
                </div>
            </div>
        </div>

        <a href="/" class="btn btn-outline back-btn">← <?php echo $lang['fun_back_to_portfolio']; ?></a>
    </div>

    <script>
        const langStrings = {
            error: "<?php echo addslashes($lang['fun_weather_error']); ?>",
            denied: "<?php echo addslashes($lang['fun_weather_denied']); ?>",
            unsupported: "<?php echo addslashes($lang['fun_weather_unsupported']); ?>"
        };

        const musicDatabase = {
            sunny: {
                en: { title: "Upbeat Synthwave Mix", url: "https://www.youtube.com/watch?v=4xDzrJKXOOY" },
                vi: { title: "V-Pop Sôi Động Hè", url: "https://www.youtube.com/watch?v=FstU97K_u6U" },
                ja: { title: "City Pop Essentials", url: "https://www.youtube.com/watch?v=3bNITQR4Uso" },
                ko: { title: "K-Pop Summer Hits", url: "https://www.youtube.com/watch?v=2S24-y0Ij3Y" }
            },
            rainy: {
                en: { title: "Rainy Day Lo-fi Beats", url: "https://www.youtube.com/watch?v=lTRiuFIWV5M" },
                vi: { title: "Lo-fi Nhạc Việt Chill", url: "https://www.youtube.com/watch?v=ZfA7V6B5YpE" },
                ja: { title: "Japanese Lo-fi Hip Hop", url: "https://www.youtube.com/watch?v=5wRWniH7rt8" },
                ko: { title: "Korean R&B Chill", url: "https://www.youtube.com/watch?v=baS_96A00O8" }
            },
            cloudy: {
                en: { title: "Moody Classical Piano", url: "https://www.youtube.com/watch?v=WJ3-F02-F_Y" },
                vi: { title: "Nhạc Không Lời Nhẹ Nhàng", url: "https://www.youtube.com/watch?v=4T858p03p2s" },
                ja: { title: "Studio Ghibli Piano Mix", url: "https://www.youtube.com/watch?v=8mY3Udau4S8" },
                ko: { title: "K-Drama Emotional OST", url: "https://www.youtube.com/watch?v=mC1v86q7uXY" }
            },
            clear: {
                en: { title: "Future Funk Party", url: "https://www.youtube.com/watch?v=v_f6Yk_09rE" },
                vi: { title: "Deep House Vietnam", url: "https://www.youtube.com/watch?v=j_2XNRE967c" },
                ja: { title: "J-Rock High Energy", url: "https://www.youtube.com/watch?v=9ayAsfS3N2E" },
                ko: { title: "K-Indie Chill Vibes", url: "https://www.youtube.com/watch?v=6rS7_0Cq344" }
            }
        };

        function getMusicSuggestion(desc, lang) {
            let category = 'sunny';
            const lowerDesc = desc.toLowerCase();
            if (lowerDesc.includes('rain') || lowerDesc.includes('drizzle') || lowerDesc.includes('shower')) {
                category = 'rainy';
            } else if (lowerDesc.includes('cloud') || lowerDesc.includes('overcast') || lowerDesc.includes('mist')) {
                category = 'cloudy';
            } else if (lowerDesc.includes('clear')) {
                category = 'clear';
            }

            return musicDatabase[category][lang] || musicDatabase[category]['en'];
        }

        async function fetchWeather() {
            const content = document.getElementById('weather-content');
            const recSection = document.getElementById('music-recommendation');
            const recText = document.getElementById('recommendation-text');
            const recLink = document.getElementById('recommendation-link');
            
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(async (position) => {
                    const lat = position.coords.latitude;
                    const lon = position.coords.longitude;
                    
                    try {
                        const response = await fetch(`https://wttr.in/${lat},${lon}?format=j1`);
                        const data = await response.json();
                        
                        const temp = data.current_condition[0].temp_C;
                        const desc = data.current_condition[0].weatherDesc[0].value;
                        const city = data.nearest_area[0].areaName[0].value;
                        const country = data.nearest_area[0].country[0].value;

                        content.innerHTML = `
                            <div class="weather-info">
                                <h2>${temp}°C</h2>
                                <p>${desc}</p>
                                <p style="font-size: 0.9rem; margin-top: 10px; opacity: 0.8;">📍 ${city}, ${country}</p>
                            </div>
                        `;

                        // Show recommendation
                        const suggestion = getMusicSuggestion(desc, "<?php echo $current_lang; ?>");
                        recText.innerText = suggestion.title;
                        recLink.href = suggestion.url;
                        recSection.style.display = 'block';

                    } catch (error) {
                        content.innerHTML = `<p>${langStrings.error}</p>`;
                    }
                }, (error) => {
                    content.innerHTML = `<p>${langStrings.denied}</p>`;
                });
            } else {
                content.innerHTML = `<p>${langStrings.unsupported}</p>`;
            }
        }

        fetchWeather();
    </script>
</body>
</html>
