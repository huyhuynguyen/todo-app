var btnCompletes = document.querySelectorAll('.main__todo-btn-complete');
for (var i in btnCompletes) {
    btnCompletes[i].onclick=function(e) {
        var icon_Todo = e.target.parentNode.closest('.main__todo-latest-container').querySelector('.main__todo-image-icon');
        if (JSON.parse(e.target.getAttribute('data'))) {
            e.target.setAttribute('data', 'false');
            e.target.innerText="Mark it as completed";
            icon_Todo.setAttribute('src', 'https://img.icons8.com/ios/50/000000/circled-x.png');
        }
        else {
            e.target.setAttribute('data', 'true');
            e.target.innerText="Mark it as uncompleted";
            icon_Todo.setAttribute('src', 'https://img.icons8.com/ios-glyphs/30/000000/double-tick.png');
        }
    }
}