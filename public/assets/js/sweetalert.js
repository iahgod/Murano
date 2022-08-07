function alerta(mensagem){
    Swal.fire(mensagem)
}
function erro(mensagem = 'Alguma coisa deu errado'){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: mensagem
      })
}
function salvar(url){
    Swal.fire({
        title: 'Você quer salvar as alterações?',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: 'Salvar',
        denyButtonText: `Não salvar`,
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        } else if (result.isDenied) {
          Swal.fire('Alterações não salvas', '', 'info')
        }
      })
}
function certeza(url){
    Swal.fire({
        title: 'Você tem certeza?',
        text: "Você não vai poder reverter a ação!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sim, confirme isto!'
      }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = url;
        }
      })
}
function carregar(){
    Swal.fire({
        title: "Carregando...",
        text: "Por favor aguarde",
        imageUrl: "https://res.cloudinary.com/murano-inc/image/upload/v1636308595/load_ndzmet.gif",
        showConfirmButton: false,
        allowOutsideClick: false
        });
}