

const apitienda = new Vue({
    el: '#apitienda',
    data: {
        rut: '',
        nombre: '',
        email: '',
        asunto: '',
        mensaje: '',
    },

    computed: {

    },
    methods: {
         save: function() {

             let datos = {
                 rut: this.rut,
                 nombre: this.nombre,
                 email: this.email,
                 asunto: this.asunto,
                 mensaje: this.mensaje
             };

             var url = '/api/IngresarContactoPagina';
             axios.post(url, datos).then(r => {

                if (r.data.response) {
                     //limpiar campos
                     this.rut = '';
                     this.nombre = '';
                     this.email = '';
                     this.asunto = '';
                     this.mensaje = '';

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Mensaje enviado con exito.',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    //window.location.href = '/';
                }else{
                    alert('Ocurrio un error...!!!');
                }
             });
         }

    },
    mounted(){

        console.log('Componente de tienda montado.')

    }

});
