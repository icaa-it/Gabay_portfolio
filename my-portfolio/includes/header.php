<?php
$pageTitle = $pageTitle ?? 'Portfolio | Your Name';
$activePage = $activePage ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="theme-color" content="#f7adad">
  <meta name="description" content="Personal portfolio of an IT student interested in technology, creative projects, and game testing.">
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header class="site-header">
  <div class="container nav-wrap">
    <a class="brand" href="index.php" aria-label="Go to homepage"><span class="brand-mark">✿</span> YOUR<span>PORTFOLIO</span></a>
    <button class="menu-toggle" aria-label="Toggle navigation" aria-expanded="false"><span></span><span></span></button>
    <nav class="main-nav" aria-label="Main navigation">
      <a class="<?= $activePage === 'home' ? 'active' : '' ?>" href="index.php">Home</a>
      <a href="index.php#about">About</a>
      <a href="index.php#projects">Projects</a>
      <a href="index.php#skills">Skills</a>
      <a class="nav-contact" href="index.php#contact">Let's talk <span>↗</span></a>
    </nav>
  </div>
</header>
<main>
