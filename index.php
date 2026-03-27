<?php
/**
 * Eenvoudige multi-domain landingspagina voor domeinen te koop.
 *
 * Vul per domein hieronder de content in. Gebruik de domeinnaam zonder protocol,
 * met of zonder www (www wordt automatisch gestript bij detectie).
 */
$domainContent = [
    'voorbeeld-domein.nl' => [
        'h1' => 'Voorbeeld Domein te koop',
        'h2' => 'Een sterke naam voor jouw volgende project',
        'body' => 'Dit premium domein is beschikbaar voor overname. Perfect voor branding, campagnes of je nieuwe online onderneming.',
    ],
    'nogeendomein.nl' => [
        'h1' => 'Nogeendomein.nl is beschikbaar',
        'h2' => 'Kort, krachtig en direct inzetbaar',
        'body' => 'Wil je snel starten met een herkenbaar webadres? Neem contact op voor prijsinformatie en overdracht.',
    ],
    'default' => [
        'h1' => 'Deze domeinnaam is beschikbaar',
        'h2' => 'Interesse in overname?',
        'body' => 'Dit domein is te koop. Neem contact met ons op voor meer informatie over de mogelijkheden en prijs.',
    ],
];

$host = $_SERVER['HTTP_HOST'] ?? 'onbekend-domein.nl';
$host = strtolower(trim($host));
$host = preg_replace('/:\\d+$/', '', $host); // verwijder poort
$domain = preg_replace('/^www\./', '', $host);

$content = $domainContent[$domain] ?? $domainContent['default'];
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($domain); ?> te koop | PEPSMEDIA</title>
    <style>
        :root {
            --bg-1: #fff8f1;
            --bg-2: #fff3e3;
            --ink: #12182b;
            --muted: #5d6478;
            --brand: #f7911a;
            --brand-dark: #d97706;
            --card: rgba(255, 255, 255, 0.86);
            --stroke: rgba(18, 24, 43, 0.08);
        }

        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            min-height: 100%;
            font-family: Inter, "Segoe UI", Roboto, Arial, sans-serif;
            color: var(--ink);
            background: linear-gradient(135deg, var(--bg-1), var(--bg-2));
        }

        body {
            position: relative;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }

        .bg-orb {
            position: fixed;
            border-radius: 999px;
            filter: blur(6px);
            opacity: 0.6;
            z-index: -1;
            animation: drift 9s ease-in-out infinite alternate;
        }

        .orb-1 {
            width: 340px;
            height: 340px;
            background: #ffdcb8;
            top: -60px;
            right: -90px;
        }

        .orb-2 {
            width: 420px;
            height: 420px;
            background: #ffd9a8;
            bottom: -120px;
            left: -120px;
            animation-delay: -6s;
        }

        .orb-3 {
            width: 220px;
            height: 220px;
            background: #ffe9d1;
            top: 38%;
            left: 72%;
            animation-delay: -12s;
        }

        @keyframes drift {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(55px, -45px) scale(1.18);
            }
        }

        .container {
            width: min(100%, 1060px);
            margin: 0 auto;
            padding: 24px 20px 40px;
        }

        .card {
            background: var(--card);
            border: 1px solid var(--stroke);
            border-radius: 22px;
            box-shadow: 0 20px 60px rgba(20, 35, 68, 0.14);
            backdrop-filter: blur(5px);
            padding: clamp(20px, 3vw, 42px);
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .logo {
            display: block;
            width: clamp(180px, 35vw, 280px);
            max-width: 100%;
            height: auto;
        }

        .domain-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-weight: 600;
            color: #1f2743;
            border: 1px solid rgba(31, 39, 67, 0.12);
            background: rgba(255, 255, 255, 0.7);
            border-radius: 999px;
            padding: 10px 14px;
            font-size: 0.95rem;
        }

        .domain-pill strong {
            color: var(--brand-dark);
        }

        h1 {
            font-size: clamp(1.7rem, 3.5vw, 2.8rem);
            margin: 0;
            line-height: 1.15;
            letter-spacing: -0.01em;
        }

        h2 {
            margin: 14px 0 0;
            font-size: clamp(1.05rem, 2.2vw, 1.45rem);
            color: #27314d;
            font-weight: 600;
        }

        .body-text {
            margin-top: 18px;
            font-size: 1.08rem;
            line-height: 1.72;
            color: var(--muted);
            max-width: 72ch;
        }

        .actions {
            margin-top: 28px;
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, var(--brand), #f6a446);
            box-shadow: 0 10px 25px rgba(235, 141, 42, 0.35);
        }

        .btn-primary:hover,
        .btn-primary:focus-visible {
            transform: translateY(-2px);
            box-shadow: 0 12px 26px rgba(235, 141, 42, 0.43);
        }

        .btn-secondary {
            color: #b56200;
            border: 1px solid rgba(247, 145, 26, 0.45);
            background: rgba(255, 255, 255, 0.85);
        }

        .btn-secondary:hover,
        .btn-secondary:focus-visible {
            background: rgba(255, 239, 220, 0.95);
            transform: translateY(-2px);
        }

        footer {
            margin-top: 34px;
            border-top: 1px solid rgba(18, 24, 43, 0.12);
            padding-top: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 12px 22px;
        }

        footer a {
            color: #7a4204;
            text-decoration: none;
            font-weight: 600;
        }

        footer a:hover,
        footer a:focus-visible {
            color: #542d04;
            text-decoration: underline;
        }

        @media (max-width: 680px) {
            .topbar {
                align-items: flex-start;
            }

            .domain-pill {
                font-size: 0.88rem;
                line-height: 1.3;
            }

            .card {
                border-radius: 16px;
            }

            .actions {
                width: 100%;
            }

            .btn {
                width: 100%;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .bg-orb,
            .btn {
                animation: none !important;
                transition: none !important;
            }
        }
    </style>
</head>
<body>
    <div class="bg-orb orb-1" aria-hidden="true"></div>
    <div class="bg-orb orb-2" aria-hidden="true"></div>
    <div class="bg-orb orb-3" aria-hidden="true"></div>

    <main class="container">
        <section class="card">
            <div class="topbar">
                <img
                    class="logo"
                    src="https://pepsmedia.nl/wp-content/uploads/2013/07/pepsmedia-logo-light-1000x233.png"
                    alt="PEPSMEDIA logo"
                    loading="eager"
                >
                <p class="domain-pill">Deze domeinnaam is te koop: <strong><?php echo htmlspecialchars($domain); ?></strong></p>
            </div>

            <header>
                <h1><?php echo htmlspecialchars($content['h1']); ?></h1>
                <h2><?php echo htmlspecialchars($content['h2']); ?></h2>
            </header>

            <p class="body-text"><?php echo htmlspecialchars($content['body']); ?></p>

            <div class="actions">
                <a class="btn btn-primary" href="https://pepsmedia.nl/contact/">Neem contact op</a>
                <a class="btn btn-secondary" href="https://pepsmedia.nl/" aria-label="Naar PEPSMEDIA website">Meer van PEPSMEDIA</a>
            </div>

            <footer>
                <a href="https://pepsmedia.nl/ssd-hosting/" target="_blank" rel="noopener noreferrer">NVMe Hosting</a>
                <a href="https://pepsmedia.nl/services/domeinnaam-registreren/" target="_blank" rel="noopener noreferrer">Domeinnaam registreren</a>
                <a href="https://pepsmedia.nl/google/workspace/" target="_blank" rel="noopener noreferrer">Google Workspace</a>
            </footer>
        </section>
    </main>
</body>
</html>
