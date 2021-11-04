function modificar(id)
{
  var url = `produto/${id}`;
  return url;
}

function modificarEdit(id)
{
  var urlEdit = `editar/${id}`;
  return urlEdit;
}

function excluir(id)
{
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Tem certeza?',
  text: "Não a Como Reveter!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Sim, Delete o Produto!',
  cancelButtonText: 'Não, Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deletado!'+ id,
      'Seu Produto foi Deletado',
      'success'
    )
    var modificado =  modificar(id);
    location.href = modificado; 

  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Seu Produto Não Foi Deletado :)',
      'error'
    )
  }
})
}

function editar(id)
{
  var modificadoEdit =  modificarEdit(id);
  location.href = modificadoEdit; 
}


function modificarPedido(id)
{
  var url = `${id}`;
  return url;
}

function excluirProdPedido(id)
{
    const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Tem certeza?',
  text: "Não a Como Reveter!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Sim, Delete o Produto!',
  cancelButtonText: 'Não, Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deletado!'+ id,
      'Seu Produto foi Deletado',
      'success'
    )
    var modificado =  modificarPedido(id);
    console.log(modificado);
    location.href = modificado; 

  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Seu Produto Não Foi Deletado :)',
      'error'
    )
  }
})
}

function excluirProdGeral(nome)
{
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

swalWithBootstrapButtons.fire({
  title: 'Tem certeza?',
  text: "Não a Como Reveter!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Sim, Delete o Produto!',
  cancelButtonText: 'Não, Cancelar!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    swalWithBootstrapButtons.fire(
      'Deletado!'+ nome,
      'Seu Produto foi Deletado',
      'success'
    )
    var url = `geral/excluir/${nome}`;
    location.href = url;

  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelado',
      'Seu Produto Não Foi Deletado :)',
      'error'
    )
  }
})
}

function editarGeral(nome)
{
  var url = `geral/${nome}`;
  location.href = url;
}

