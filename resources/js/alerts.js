const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

function successAlert(message) {
    Toast.fire({
        icon: 'success',
        title: message
    })
}

function alertError(message) {
    Toast.fire({
        icon: 'error',
        title: message
    })
}

function alertInfo(message) {
    Toast.fire({
        icon: 'info',
        title: message
    })
}
