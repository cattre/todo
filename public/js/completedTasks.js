$completedHeader = document.querySelector('.collapse-header')

$completedHeader.addEventListener('click', () => {
    $completedHeader.querySelector('svg').classList.toggle('fa-chevron-down')
    $completedHeader.querySelector('svg').classList.toggle('fa-chevron-up')
})