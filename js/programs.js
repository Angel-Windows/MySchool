
const scrollTabs = (button) => {
    const filterSection = button.closest('section');
    const activeTab = filterSection.querySelector('.progtab.active');
    const progtabsContainer = filterSection.querySelector('#progtabs');
    const isNext = button.classList.contains('arrow-next');
    let nextTab = isNext ? activeTab.nextElementSibling : activeTab.previousElementSibling;
    while (nextTab && nextTab.classList.contains('program_menu__divider')) {
        nextTab = isNext ? nextTab.nextElementSibling : nextTab.previousElementSibling;
    }

    if (!nextTab || !nextTab.classList.contains('progtab')) {
        nextTab = filterSection.querySelector(`.progtab:${isNext ? 'first-of-type' : 'last-of-type'}`);
    }


    const tabRect = nextTab.getBoundingClientRect();
    const containerRect = progtabsContainer.getBoundingClientRect();
    const scrollOffset = tabRect.left - containerRect.left + progtabsContainer.scrollLeft;

    progtabsContainer.scrollTo({
        left: scrollOffset,
        behavior: 'smooth'
    });

    const filterData = `${nextTab.id}-content`;
    filterSection.querySelector('.active').classList.remove('active');
    nextTab.classList.add('active');
    const allPrograms = filterSection.querySelectorAll('.programs-cat-list')?.forEach(el => {
        el.classList.remove('active')
    });
    filterSection.querySelector(`#${filterData}`).classList.add('active');
};

document.querySelectorAll('.program_menu__arrow_previous, .program_menu__arrow_next').forEach(button => {
    button.addEventListener('click', () => scrollTabs(button));
});

