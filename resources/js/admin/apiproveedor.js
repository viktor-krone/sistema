

const apiproveedor = new Vue({
    el: '#apiproveedor',
    data: {
        token: App.api_token,
        razon: '',
        rut: '',
        div_mensajerut:'rut Existe',
        div_clase_rut: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton:1
    },
    computed: {
        generarrut : function(){
            var char= {
                "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;

            this.rut =  this.nombre.trim().replace(expr, function(e){
                return char[e]
            }).toLowerCase()

           return this.rut;
           //return this.nombre.trim().replace(/ /g,'-').toLowerCase()
        }
    },
    methods: {
        getProveedor() {

            if (this.rut) {
                let url = '/api/proveedor/'+this.rut;
                axios.get(url,{
                    headers: {
                        Authorization: `Bearer ` + this.token
                    }
                }).then(response => {
                this.div_mensajerut = response.data;
                    if (this.div_mensajerut==="Rut Disponible") {
                        this.div_clase_rut = 'badge badge-success';
                        this.deshabilitar_boton=0;
                    } else {
                        this.div_clase_rut = 'badge badge-danger';
                        this.deshabilitar_boton=1;
                    }
                    this.div_aparecer = true;

                    if (document.getElementById('editar')) {
                        if ( document.getElementById('nombretemp').innerHTML===this.nombre) {
                            this.deshabilitar_boton=0;
                            this.div_mensajerut='';
                            this.div_clase_rut='';
                            this.div_aparecer = false;

                        }
                    }

                })

            }else{
                this.div_clase_rut = 'badge badge-danger';
                this.div_mensajerut="Debes escribir una categoria";
                this.deshabilitar_boton=1;
                this.div_aparecer = true;


            }




        }
    },
    mounted(){
        if (document.getElementById('editar')) {
            this.nombre = document.getElementById('nombretemp').innerHTML;
            this.deshabilitar_boton=0;

        }
    }

});
