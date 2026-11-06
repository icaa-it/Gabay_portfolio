RICAMAE GABAY — PERSONAL PORTFOLIO (PHP, NO DATABASE)

REQUIREMENTS
- XAMPP (Apache)
- PHP 8+ recommended
- A modern browser

HOW TO RUN WITH XAMPP
1. Extract the my-portfolio folder.
2. Copy it into your XAMPP htdocs folder.
   Example: C:\xampp\htdocs\my-portfolio
3. Open the XAMPP Control Panel and start Apache.
4. Visit: http://localhost/my-portfolio/

PROJECT FILES
- index.php              Main page (hero, about, projects, skills, contact)
- includes/header.php    Site header and navigation
- includes/footer.php    Site footer
- images/                Profile photos used by the hero and ID card
- (CSS / JS files, if separated)

CUSTOMIZE YOUR DETAILS
- All site content lives in index.php:
  * $pageTitle / $activePage  — page title and active nav link
  * $photoPath                — hero photo path (default: images/profile.jpg)
  * $projects                 — array that generates the project cards
  * $skills                   — array that generates the skill list
- About Me paragraph is in the <section id="about"> block of index.php.
- Contact button uses a mailto link — replace your.email@example.com
  in the <section id="contact"> block.
- Update the footer name in includes/footer.php.
- ID card photo is set in the hero section:
  <img src="images/my-profile-pic.jpg" ... class="profile-image">
  Replace this file with your own photo.

PROJECTS ARRAY
Each project card is generated from an entry in $projects:
  'number'      → card label ("PROJECT 01")
  'name'        → project title
  'type'        → small type/category line
  'description' → short description
  'tags'        → array of tag chips
  'symbol'      → emoji/icon shown on the visual
  'tone'        → card color: 'pink' | 'aqua' | 'yellow'

SKILLS ARRAY
Edit $skills in index.php; numbering (01, 02, ...) is generated
automatically from the array index.

COLOR PALETTE
- Coral pink: #F18F91
- Soft pink: #F7ADAD
- Aqua: #B1E8E5
- Light aqua: #D5F7F4

NOTES
- No database is required; everything is static PHP + HTML/CSS.
- Project cards are output with htmlspecialchars() — keep that when
  editing content to avoid broken markup.
- Image path check: the hero uses images/profile.jpg ($photoPath),
  while the ID card uses images/my-profile-pic.jpg. Make sure both
  files exist in the images/ folder (or point both to one photo).
- Google Fonts are loaded online; system fallback fonts are used offline.
