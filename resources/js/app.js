require('./bootstrap');


function confirmDelete() {
    if(!confirm('Tem certeza que deseja excluir esse registro?'))
    event.preventDefault();
}