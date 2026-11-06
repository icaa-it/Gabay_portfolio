<?php
$pageTitle = 'Your Name | IT Student & Game Tester';
$activePage = 'home';
$projects = [
  [
    'number' => '01', 'name' => 'KNIGHTS OUT', 'type' => 'Board Game Design',
    'description' => 'A survival-inspired tabletop game where players collect gems, complete the word KEY, and race to rescue the princess.',
    'tags' => ['Game Design', 'Prototyping', 'Team Project'], 'symbol' => '♜', 'tone' => 'pink'
  ],
  [
    'number' => '02', 'name' => 'Artisan Maker Space', 'type' => 'Java · MySQL · UI Design',
    'description' => 'A management system concept for handling users, tools, workspaces, and bookings in a maker space.',
    'tags' => ['Java', 'MySQL', 'System Analysis'], 'symbol' => '⌘', 'tone' => 'aqua'
  ],
  [
    'number' => '03', 'name' => 'GreenQuest', 'type' => 'Game Concept',
    'description' => 'A game-based concept that encourages players to explore sustainable habits through engaging challenges.',
    'tags' => ['Game Concept', 'Sustainability', 'SDGs'], 'symbol' => '✳', 'tone' => 'peach'
  ],
];
$skills = ['HTML & CSS', 'PHP fundamentals', 'Java', 'MySQL', 'UI / Wireframing', 'Game testing interest', 'Team collaboration', 'Problem solving'];
?>
<?php include __DIR__ . '/includes/header.php'; ?>
<section class="hero section-pad">
  <div class="container hero-grid">
    <div class="hero-copy reveal">
      <p class="eyebrow"><span class="eyebrow-line"></span> HELLO, WORLD! I'M</p>
      <h1>Your Name<span class="accent-dot">.</span></h1>
      <h2>IT Student <span class="muted-word">&</span><br><span class="outline-text">Aspiring Game Tester</span></h2>
      <p class="hero-description">I’m exploring the world of technology, creative problem-solving, and games. I enjoy turning ideas into projects and discovering how digital experiences can be made better.</p>
      <div class="hero-actions">
        <a class="button button-dark" href="#projects">Explore my work <span>↗</span></a>
        <a class="text-link" href="#about">A little about me <span>↓</span></a>
      </div>
      <div class="hero-note"><span class="note-dot"></span> Currently learning, building, and leveling up.</div>
    </div>
    <div class="hero-art reveal">
      <div class="art-orbit orbit-one"></div><div class="art-orbit orbit-two"></div>
      <div class="lanyard-anchor" aria-hidden="true"><span></span></div>
      <div class="pull-id-wrap" id="pullIdWrap" style="--strap-length: 150px; --swing-angle: 0deg;">
        <svg class="lanyard-strap" id="lanyardStrap" viewBox="0 0 230 180" preserveAspectRatio="none" aria-hidden="true">
          <defs>
            <path id="strapTextPath" d="M115 0 C108 55 122 125 115 180" />
          </defs>
          <path class="strap-shadow" d="M115 0 C108 55 122 125 115 180" />
          <path class="strap-ribbon" d="M115 0 C108 55 122 125 115 180" />
          <path class="strap-edge" d="M110 0 C103 55 117 125 110 180" />
          <text class="strap-lettering"><textPath href="#strapTextPath">ID CARD • ID CARD • ID CARD • ID CARD • ID CARD •</textPath></text>
        </svg>
        <div class="lanyard-hook" aria-hidden="true"><span></span></div>
        <button class="id-card" id="pullId" type="button" aria-label="Pull down my portfolio ID card" aria-describedby="idHint">
          <span class="id-card-top"><span>PERSONAL IDENTIFICATION</span><span class="id-chip">✦</span></span>
          <span class="id-photo">
            <span class="id-photo-placeholder"><span class="photo-head"></span><span class="photo-body"></span></span>
            <span class="id-photo-caption">YOUR PHOTO</span>
          </span>
          <span class="id-card-name">YOUR NAME</span>
          <span class="id-card-role">INFORMATION TECHNOLOGY STUDENT</span>
          <span class="id-card-bottom"><span>CREATIVE • CURIOUS • ALWAYS LEARNING</span><span>01</span></span>
        </button>
      </div>
      <span class="id-hint" id="idHint">↕ &nbsp; PULL THE ID CARD</span>
      <div class="floating-chip chip-top">✿ &nbsp; always creating</div>
      <div class="floating-chip chip-bottom">GAME ON <span>♡</span></div>
      <span class="decor-star star-one">✳</span><span class="decor-star star-two">✦</span>
    </div>
  </div>
  <div class="container hero-bottom"><span>SCROLL TO EXPLORE</span><span class="scroll-line"></span><span>01 — PORTFOLIO</span></div>
</section>
<section class="intro-strip"><div class="container strip-inner"><span>CREATIVE THINKER</span><i>✳</i><span>TECH ENTHUSIAST</span><i>✳</i><span>GAMING INTEREST</span><i>✳</i><span>ALWAYS LEARNING</span></div></section>
<section class="section-pad about-section" id="about">
  <div class="container two-col">
    <div class="section-heading reveal"><p class="eyebrow">01 / ABOUT ME</p><h2>A little bit<br>about <span>my world.</span></h2><div class="heading-sticker">nice to<br>meet you! <b>☺</b></div></div>
    <div class="about-copy reveal"><p class="large-copy">I'm an Information Technology student with an interest in how technology and creativity come together.</p><p>I like exploring new tools, working with a team, and bringing concepts to life through school and personal projects. I'm also interested in the gaming industry, especially the process of testing games and improving the player experience.</p><p>Every project is a chance to learn something new, make mistakes, and come back with a better idea.</p><a class="underlined-link" href="#contact">Let's connect <span>↗</span></a></div>
  </div>
</section>
<section class="section-pad projects-section" id="projects">
  <div class="container">
    <div class="section-top reveal"><div><p class="eyebrow">02 / SELECTED WORK</p><h2>Things I've <span>worked on.</span></h2></div><p class="section-side-note">A collection of concepts, school projects,<br>and experiments along the way.</p></div>
    <div class="project-grid">
      <?php foreach ($projects as $project): ?>
      <article class="project-card <?= htmlspecialchars($project['tone']) ?> reveal">
        <div class="project-visual"><span class="project-number">PROJECT <?= htmlspecialchars($project['number']) ?></span><span class="project-symbol" aria-hidden="true"><?= htmlspecialchars($project['symbol']) ?></span><span class="visual-caption">IDEA → IN PROGRESS</span></div>
        <div class="project-info"><p class="project-type"><?= htmlspecialchars($project['type']) ?></p><h3><?= htmlspecialchars($project['name']) ?></h3><p><?= htmlspecialchars($project['description']) ?></p><div class="tag-list"><?php foreach ($project['tags'] as $tag): ?><span><?= htmlspecialchars($tag) ?></span><?php endforeach; ?></div></div>
      </article>
      <?php endforeach; ?>
    </div>
    <p class="project-footnote">More projects and details can be added as the portfolio grows. <span>✳</span></p>
  </div>
</section>
<section class="section-pad skills-section" id="skills">
  <div class="container skills-layout">
    <div class="section-heading reveal"><p class="eyebrow">03 / MY TOOLKIT</p><h2>Learning one<br><span>skill at a time.</span></h2><p class="skills-intro">Tools and skills I'm currently exploring through classes, projects, and practice.</p></div>
    <div class="skills-panel reveal"><div class="skills-panel-top"><span>SKILLS & INTERESTS</span><span>✳</span></div><div class="skill-list"><?php foreach ($skills as $index => $skill): ?><div class="skill-item"><span class="skill-index">0<?= $index + 1 ?></span><span><?= htmlspecialchars($skill) ?></span><span class="skill-plus">+</span></div><?php endforeach; ?></div></div>
  </div>
</section>
<section class="contact-section section-pad" id="contact">
  <div class="container contact-inner reveal"><p class="eyebrow">04 / GET IN TOUCH</p><h2>Have an idea?<br><span>Let's talk!</span></h2><p>I'm always open to learning, collaborating, and connecting with people who love making things.</p><a class="button button-light" href="mailto:your.email@example.com">Say hello <span>↗</span></a><div class="contact-doodle">✿</div></div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
