
const apiempresa = new Vue({
    el: '#apiempresa',
    data: {
        token: App.api_token,
        rut_empresa: '',
        div_mensajeslug:'Rut ya Existe',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton:1
    },
    computed: {

    },
    methods: {
        getEmpresa() {
            if (this.rut_empresa) {
                let url = '/api/empresa/'+this.rut_empresa;
                axios.get(url,
                    {
                        headers: {
                            Authorization: `Bearer ` + this.token
                        }
                    }

                ).then(response => {
                this.div_mensajeslug = response.data;
                    if (this.div_mensajeslug==="Empresa Disponible") {
                        this.div_clase_slug = 'badge badge-success';
                        this.deshabilitar_boton=0;
                    } else {
                        this.div_clase_slug = 'badge badge-danger';
                        this.deshabilitar_boton=1;
                    }
                    this.div_aparecer = true;

                    if (document.getElementById('editar')) {
                        if ( document.getElementById('rut_empresatemp').innerHTML===this.rut_empresa) {
                            this.deshabilitar_boton=0;
                            this.div_mensajeslug='';
                            this.div_clase_slug='';
                            this.div_aparecer = false;

                        }
                    }

                })

            }else{
                this.div_clase_slug = 'badge badge-danger';
                this.div_mensajeslug="Debes escribir una categoria";
                this.deshabilitar_boton=1;
                this.div_aparecer = true;


            }




        }
    },
    mounted(){

        if (document.getElementById('editar')) {
            this.rut_empresa = document.getElementById('rut_empresatemp').innerHTML;
            this.deshabilitar_boton=0;

        }
    }

});
