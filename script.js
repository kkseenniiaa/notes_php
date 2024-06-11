function deleteTask(taskId) {
    if (confirm("Удалить заметку?")) {
        fetch(`delete_notes.php?id=${taskId}`, {
            method: 'GET'
        })
            .then(() => {
                window.location.reload();
            })
            .catch((error) => {
                console.log('Ошибка удаления!');
            })
    }
}