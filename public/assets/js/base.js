//**POPOVER
var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
    })

//**EDITOR CKEDITOR
ClassicEditor.create( document.querySelector( '.editor' ), {
                licenseKey: '',
            } )
            .then( editor => {
                window.editor = editor;
            } )

//**SWEET ALERT TOAST

function toast(mensagem){
    let tipo = mensagem.split('@');
    console.log(tipo[0])
    let icone = '';
    if(tipo[0] == 1){
        icone = 'success';
    }else{
        icone = 'error';
    }
    Swal.fire({
        toast: true,
        icon: icone,
        title: tipo[1],
        animation: false,
        position: 'top-right',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
      })
}