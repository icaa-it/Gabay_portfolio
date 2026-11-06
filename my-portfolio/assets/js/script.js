const menuToggle = document.querySelector('.menu-toggle');
const mainNav = document.querySelector('.main-nav');
if (menuToggle && mainNav) {
  menuToggle.addEventListener('click', () => {
    const isOpen = mainNav.classList.toggle('open');
    menuToggle.setAttribute('aria-expanded', String(isOpen));
  });
  mainNav.querySelectorAll('a').forEach(link => link.addEventListener('click', () => {
    mainNav.classList.remove('open');
    menuToggle.setAttribute('aria-expanded', 'false');
  }));
}
const revealItems = document.querySelectorAll('.reveal');
if ('IntersectionObserver' in window) {
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });
  revealItems.forEach(item => observer.observe(item));
} else {
  revealItems.forEach(item => item.classList.add('visible'));
}


document.addEventListener("DOMContentLoaded", () => {
    const wrap = document.querySelector("#pullIdWrap");
    const card = document.querySelector("#pullId");
    const rope = document.querySelector("#lanyardRope");

    if (!wrap || !card || !rope) return;

    const paths = rope.querySelectorAll("path");

    let pull = 0;
    let velocity = 0;
    let angle = 0;
    let angularVelocity = 0;

    let targetPull = 0;
    let targetAngle = 0;

    let dragging = false;
    let startY = 0;
    let startX = 0;
    let initialPull = 0;
    let initialAngle = 0;
    let previousY = 0;
    let lastTime = 0;

    const MAX_PULL = 110;
    const SPRING = 0.14;
    const DAMPING = 0.72;

    function clamp(value, min, max) {
        return Math.max(min, Math.min(max, value));
    }

    function updateRope() {
        const endY = 112 + pull;
        const sway = Math.sin(angle * Math.PI / 180) * 20;

        const path = `
            M 115 12
            C ${115 - sway} 48,
              ${115 + sway} ${endY - 48},
              115 ${endY}
        `;

        paths.forEach(p => p.setAttribute("d", path));
    }

    function render() {
        wrap.style.transform =
            `translateX(-50%) translateY(${pull}px) rotate(${angle}deg)`;

        updateRope();
    }

    function animate(time) {
        if (!dragging) {
            // Vertical spring bounce
            const pullForce = (targetPull - pull) * SPRING;

            velocity += pullForce;
            velocity *= DAMPING;
            pull += velocity;

            // Natural swinging motion
            const rotationForce = (targetAngle - angle) * 0.075;

            angularVelocity += rotationForce;
            angularVelocity *= 0.91;
            angle += angularVelocity;
        }

        render();

        if (
            !dragging &&
            Math.abs(pull - targetPull) < 0.08 &&
            Math.abs(velocity) < 0.08 &&
            Math.abs(angle - targetAngle) < 0.08 &&
            Math.abs(angularVelocity) < 0.08
        ) {
            pull = targetPull;
            angle = targetAngle;
            velocity = 0;
            angularVelocity = 0;
            render();
            return;
        }

        requestAnimationFrame(animate);
    }

    card.addEventListener("pointerdown", (e) => {
        if (e.button !== 0 && e.pointerType === "mouse") return;

        dragging = true;

        startY = e.clientY;
        startX = e.clientX;

        previousY = e.clientY;
        lastTime = performance.now();

        initialPull = pull;
        initialAngle = angle;

        targetPull = pull;
        targetAngle = angle;

        velocity = 0;
        angularVelocity = 0;

        card.setPointerCapture(e.pointerId);
    });

    card.addEventListener("pointermove", (e) => {
        if (!dragging) return;

        // Positive movement means DOWN, not UP.
        const deltaY = e.clientY - startY;
        const deltaX = e.clientX - startX;

        pull = clamp(initialPull + deltaY, 0, MAX_PULL);

        // Small side-to-side tilt while dragging.
        angle = clamp(
            initialAngle + deltaX * 0.12,
            -12,
            12
        );

        const now = performance.now();
        const elapsed = Math.max(1, now - lastTime);

        velocity = ((e.clientY - previousY) / elapsed) * 16;

        previousY = e.clientY;
        lastTime = now;

        render();
    });

    function release() {
        if (!dragging) return;

        dragging = false;

        // Return to the hanging position.
        targetPull = 0;
        targetAngle = 0;

        // Give the ID a little release momentum.
        velocity = clamp(velocity, -7, 7);
        angularVelocity = clamp(angularVelocity, -2, 2);
    }

    card.addEventListener("pointerup", release);
    card.addEventListener("pointercancel", release);
    card.addEventListener("lostpointercapture", release);

    // Initial position
    render();
    requestAnimationFrame(animate);
});


    render();
    if (dragging || Math.abs(length - REST_LENGTH) > 0.15 || Math.abs(lengthVelocity) > 0.8 || Math.abs(angle) > 0.0015 || Math.abs(angularVelocity) > 0.008) {
      animationFrame = requestAnimationFrame(animate);
    } else {
      animationFrame = 0;
      lastFrameTime = 0;
    }
  

  function startAnimation() {
    if (!animationFrame) animationFrame = requestAnimationFrame(animate);
  }

  function pointerDown(event) {
    if (event.button !== undefined && event.button !== 0) return;
    dragging = true;
    pointerId = event.pointerId;
    previousPointer = { x: event.clientX, y: event.clientY };
    dragStartX = event.clientX;
    dragStartY = event.clientY;
    dragStartLength = length;
    dragStartAngle = angle;
    previousTime = performance.now();
    lengthVelocity = 0;
    angularVelocity = 0;
    card.setPointerCapture(pointerId);
    event.preventDefault();
    startAnimation();
  }

  function pointerMove(event) {
    if (!dragging || event.pointerId !== pointerId) return;
    // Measure the drag from its starting point so grabbing any part of the card
    // does not cause the badge to jump to a different length.
    const dx = event.clientX - dragStartX;
    const dy = event.clientY - dragStartY;
    length = clamp(dragStartLength + dy, MIN_LENGTH, MAX_LENGTH);
    angle = clamp(dragStartAngle + dx / Math.max(length, 1), -0.58, 0.58);

    const now = performance.now();
    const elapsed = Math.max((now - previousTime) / 1000, 0.008);
    lengthVelocity = clamp((event.clientY - previousPointer.y) / elapsed, -900, 900) * 0.28;
    angularVelocity = clamp((event.clientX - previousPointer.x) / elapsed / Math.max(length, 1), -5, 5) * 0.35;
    previousPointer = { x: event.clientX, y: event.clientY };
    previousTime = now;
    render();
  }

  function release(event) {
    if (!dragging || (event && event.pointerId !== undefined && event.pointerId !== pointerId)) return;
    dragging = false;
    pointerId = null;
    // Give the elastic strap a small upward recoil and let the badge swing freely.
    if (Math.abs(lengthVelocity) < 60 && Math.abs(length - REST_LENGTH) > 5) {
      lengthVelocity = -70;
    }
    if (Math.abs(angularVelocity) < 0.35 && Math.abs(angle) > 0.03) {
      angularVelocity = -Math.sign(angle) * 0.45;
    }
    startAnimation();
  }

  card.addEventListener('pointerdown', pointerDown);
  card.addEventListener('pointermove', pointerMove);
  card.addEventListener('pointerup', release);
  card.addEventListener('pointercancel', release);
  card.addEventListener('lostpointercapture', release);

  // Keyboard interaction for accessibility.
  card.addEventListener('keydown', event => {
    if (event.key === 'ArrowDown') {
      event.preventDefault();
      length = clamp(length + 18, MIN_LENGTH, MAX_LENGTH);
      lengthVelocity = 110;
      startAnimation();
    } else if (event.key === 'ArrowUp') {
      event.preventDefault();
      length = clamp(length - 18, MIN_LENGTH, MAX_LENGTH);
      lengthVelocity = -100;
      startAnimation();
    } else if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
      event.preventDefault();
      angle = clamp(angle + (event.key === 'ArrowLeft' ? -0.12 : 0.12), -0.58, 0.58);
      angularVelocity = event.key === 'ArrowLeft' ? -1.1 : 1.1;
      startAnimation();
    }
  });

  render();
