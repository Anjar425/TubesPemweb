document.addEventListener('DOMContentLoaded', () => {
    const section1 = document.querySelector('#content');
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                section1.classList.remove('fade-out-down');
                section1.classList.add('fade-in-up');
            } else {
                section1.classList.remove('fade-in-up');
                section1.classList.add('fade-out-down');
            }
        });
    }, {
        threshold: 0.9
    });

    observer.observe(section1);
});
