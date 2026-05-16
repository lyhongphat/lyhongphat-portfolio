<?php global $lang, $current_lang; ?>
<!DOCTYPE html>
<html lang="<?php echo htmlspecialchars($current_lang); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | Ly Hong Phat</title>
    <meta name="description" content="Professional portfolio showcasing projects and skills.">
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .lang-switcher {
            display: flex;
            gap: 10px;
            margin-left: 20px;
            align-items: center;
        }
        .lang-switcher a {
            color: var(--text-light);
            font-size: 0.85rem;
            text-decoration: none;
            transition: var(--transition);
            font-weight: 600;
        }
        .lang-switcher a:hover, .lang-switcher a.active {
            color: var(--accent);
        }
    </style>
</head>
<body>
    <header class="navbar">
        <div class="container nav-container">
            <a href="#" class="logo">Port<span>folio.</span></a>
            <nav id="nav-menu">
                <ul class="nav-links">
                    <li><a href="#hero" class="nav-link"><?php echo $lang['nav_home']; ?></a></li>
                    <li><a href="#about" class="nav-link"><?php echo $lang['nav_about']; ?></a></li>
                    <li><a href="#projects" class="nav-link"><?php echo $lang['nav_projects']; ?></a></li>
                    <li><a href="/fun" class="nav-link"><?php echo $lang['fun_nav']; ?></a></li>
                    <li><a href="#contact" class="btn btn-outline nav-link"><?php echo $lang['nav_contact']; ?></a></li>
                </ul>
                <div class="lang-switcher">
                    <button id="theme-toggle" aria-label="Toggle Dark Mode" style="background: none; border: none; cursor: pointer; font-size: 1.2rem; margin-right: 15px; display: flex; align-items: center;">
                        <span id="theme-icon">🌞</span>
                    </button>
                    <a href="?lang=en" class="<?php echo $current_lang === 'en' ? 'active' : ''; ?>">EN</a>
                    <a href="?lang=ja" class="<?php echo $current_lang === 'ja' ? 'active' : ''; ?>">JA</a>
                    <a href="?lang=ko" class="<?php echo $current_lang === 'ko' ? 'active' : ''; ?>">KO</a>
                    <a href="?lang=vi" class="<?php echo $current_lang === 'vi' ? 'active' : ''; ?>">VI</a>
                </div>
            </nav>
            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>
