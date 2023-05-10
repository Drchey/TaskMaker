<script>
const taskList = document.querySelector('#task-list');

// Initialize the task with the drag and drop functionality
new Sortable(taskList, {
    animation: 150,
    onEnd: function(event) {
        const task = event.item;
        const taskId = task.dataset.id;
        const taskPriority = task.dataset.priority;

        fetch(`/tasks/order/${taskId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    priority: taskPriority
                })
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error(error));
    }
});
</script>