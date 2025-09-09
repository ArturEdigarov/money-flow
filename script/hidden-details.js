document.addEventListener('DOMContentLoaded', () => {
    const items = document.querySelectorAll('.transaction-history__item');

    items.forEach(item => {
        item.addEventListener('click', () => {


            items.forEach(other => {
                if (other !== item) {
                    other.classList.remove('active');
                }
            });

            item.classList.toggle('active');
        });
    });
});
