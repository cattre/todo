$tasks = document.querySelectorAll('.task')

$tasks.forEach(task => {
    task.addEventListener('click', () => {
        let id = task.getAttribute('id')
        let url = `/edit?+${id}=Edit`

        window.location.href = url
    })
})