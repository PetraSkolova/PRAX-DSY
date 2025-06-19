document.addEventListener('DOMContentLoaded', function () {
    // HAMBURGER MENU TOGGLE
    const hamburgerMenu = document.getElementById('hamburgerMenu');
    const mobileNavOverlay = document.getElementById('mobileNavOverlay');
    const mobileNavLinks = mobileNavOverlay ? mobileNavOverlay.querySelectorAll('ul li a') : [];

    let scrollY = 0;

    function toggleMobileMenu() {
        hamburgerMenu.classList.toggle('open');
        mobileNavOverlay.classList.toggle('active');

        if (mobileNavOverlay.classList.contains('active')) {
            scrollY = window.scrollY;
            const scrollbarWidth = window.innerWidth - document.documentElement.clientWidth;

            document.body.style.position = 'fixed';
            document.body.style.top = `-${scrollY}px`;
            document.body.style.left = '0';
            document.body.style.right = '0';
            document.body.style.width = '100%';
            document.body.style.paddingRight = `${scrollbarWidth}px`;
        } else {
            document.body.style.position = '';
            document.body.style.top = '';
            document.body.style.left = '';
            document.body.style.right = '';
            document.body.style.width = '';
            document.body.style.paddingRight = '';
            window.scrollTo(0, scrollY);
        }
    }

    if (hamburgerMenu) {
        hamburgerMenu.addEventListener('click', toggleMobileMenu);
    }

    mobileNavLinks.forEach(link => {
        link.addEventListener('click', function (event) {
            toggleMobileMenu();
            event.preventDefault();

            const targetId = this.getAttribute('href');
            const targetElement = document.querySelector(targetId);

            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            }

            updateActiveLink(targetId);
        });
    });

    function updateActiveLink(currentHash) {
        mobileNavLinks.forEach(link => {
            link.classList.remove('active-link');
            if (link.getAttribute('href') === currentHash) {
                link.classList.add('active-link');
            }
        });
    }

    const sections = document.querySelectorAll('section[id]');
    const observerOptions = {
        root: null,
        rootMargin: '0px',
        threshold: 0.5
    };

    const sectionObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                updateActiveLink('#' + entry.target.id);
            }
        });
    }, observerOptions);

    sections.forEach(section => {
        sectionObserver.observe(section);
    });

    window.addEventListener('load', () => {
        if (window.location.hash) {
            updateActiveLink(window.location.hash);
            const initialTarget = document.querySelector(window.location.hash);
            if (initialTarget) {
                window.scrollTo({
                    top: initialTarget.offsetTop,
                    behavior: 'smooth'
                });
            }
        } else {
            if (sections.length > 0) {
                updateActiveLink('#' + sections[0].id);
            }
        }
    });


    document.querySelectorAll('.rozbal-sipka').forEach(button => {
        button.addEventListener('click', () => {
            const txtElement = button.closest('.txt');
            txtElement.classList.toggle('expanded');
        });
    });

    // PODUJATIA 
    document.querySelectorAll('.toggle-container').forEach(function (toggleContainer) {
        toggleContainer.addEventListener('click', function () {
            const article = toggleContainer.closest('article');
            const textElement = article.querySelector('.expandable-text');
            const arrow = toggleContainer.querySelector('.toggle-arrow');

            textElement.classList.toggle('expanded');
            arrow.classList.toggle('rotated');
        });
    });

    // KONTAKTY 
    const kontaktItems = document.querySelectorAll('.kontakt');

    function isMobileView() {
        return window.matchMedia('(max-width: 412px)').matches;
    }

    kontaktItems.forEach(item => {
        item.addEventListener('click', function (event) {
            event.stopPropagation();
            const infoElement = this.querySelector('.kontakt-info');

            if (isMobileView() && infoElement) {
                infoElement.classList.toggle('show');
            }
        });
    });

    function handleResize() {
        kontaktItems.forEach(item => {
            const infoElement = item.querySelector('.kontakt-info');
            if (infoElement) {
                if (isMobileView()) {
                    infoElement.classList.remove('show');
                } else {
                    infoElement.classList.add('show');
                }
            }
        });
    }

    handleResize();
    window.addEventListener('resize', handleResize);
});