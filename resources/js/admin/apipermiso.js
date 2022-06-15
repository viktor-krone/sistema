

const apipermiso = new Vue({
    el: '#apipermiso',
    data: {
        token: App.api_token,
        display_name: '',
        name: '',
        div_mensajeslug:'Nombre Existe',
        div_clase_slug: 'badge badge-danger',
        div_aparecer: false,
        deshabilitar_boton:1
    },
    computed: {
        generarSLug : function(){
            var char= {
                "á":"a","é":"e","í":"i","ó":"o","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "ñ":"n","Ñ":"N"," ":"-","_":"-"
            }
            var expr = /[áéíóúÁÉÍÓÚÑñ_ ]/g;

            this.name =  this.display_name.trim().replace(expr, function(e){
                return char[e]
            }).toLowerCase()

           return this.name;
           //return this.display_name.trim().replace(/ /g,'-').toLowerCase()
        }
    },
    methods: {
        getPermiso() {
            console.log(this.display_name);
            if (this.display_name) {
                let url = '/api/permiso/'+this.display_name;
                axios.get(url,{
                    headers: {
                        Authorization: `Bearer ` + this.token
                    }
                }).then(response => {
                this.div_mensajeslug = response.data;
                    if (this.div_mensajeslug==="Nombre Disponible") {
                        this.div_clase_slug = 'badge badge-success';
                        this.deshabilitar_boton=0;
                    } else {
                        this.div_clase_slug = 'badge badge-danger';
                        this.deshabilitar_boton=1;
                    }
                    this.div_aparecer = true;

                    if (document.getElementById('editar')) {
                        if ( document.getElementById('nombretemp').innerHTML===this.display_name) {
                            this.deshabilitar_boton=0;
                            this.div_mensajeslug='';
                            this.div_clase_slug='';
                            this.div_aparecer = false;

                        }
                    }

                })

            }else{
                this.div_clase_slug = 'badge badge-danger';
                this.div_mensajeslug="Debes escribir un permiso";
                this.deshabilitar_boton=1;
                this.div_aparecer = true;


            }




        }
    },
    mounted(){
        if (document.getElementById('editar')) {
            this.display_name = document.getElementById('nombretemp').innerHTML;
            this.deshabilitar_boton=0;

        }
    }

});
