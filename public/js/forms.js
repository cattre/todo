$tasks = document.querySelectorAll('.task')

$tasks.forEach(task => {
    task.addEventListener('click', () => {
        let id = task.getAttribute('id')
        let url = `/edit?+${id}=Edit`

        // let formData = new FormData()
        // formData.append('id', '37')
        //
        // let request = new XMLHttpRequest();
        // request.open('GET', '/edit');
        // request.send(id);
        window.location.href = url
    })
})