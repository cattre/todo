let $completedHeader = document.querySelector('.collapse-header')
let $completedTable = document.querySelector('.collapse')

$completedHeader.addEventListener('click', () => {
    $completedHeader.querySelector('svg').classList.toggle('fa-chevron-down')
    $completedHeader.querySelector('svg').classList.toggle('fa-chevron-up')

    if ($completedTable.classList.contains('show')) {
        sessionStorage.setItem('state', 'collapsed');
    } else {
        sessionStorage.setItem('state', 'expanded');
    }
})

window.addEventListener('load', () => {
    if (sessionStorage.getItem('state') === 'expanded') {
        $completedTable.classList.add('show');
    }
})