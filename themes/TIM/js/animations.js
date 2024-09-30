document.addEventListener('DOMContentLoaded', () => {
    const hiddenElements = document.querySelectorAll('.hidden');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                entry.target.classList.add('showCube');
                entry.target.classList.remove('reverse');
                console.log('show');
            } else {
                entry.target.classList.remove('show');
                entry.target.classList.add('reverse');
                entry.target.classList.add('hideCube');
                console.log('reverse');
            }
        },
        {
            threshold: 0.9,
            rootMargin: '0px 0px -100px 0px'
        });
    });

    hiddenElements.forEach((el) => observer.observe(el));
});
