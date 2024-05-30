document.querySelectorAll('.username-item').forEach(item => {
    item.addEventListener('click', event => {
        document.getElementById('to').value = event.target.textContent; 
    });
});