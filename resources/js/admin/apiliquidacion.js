/*
import easy_autocomplete from 'easy-autocomplete'

const apiliquidacion = new Vue({
    el: '#apiliquidacion',
		data: function() {
            return {
                fillTrabajador: {'id': 0, 'rut': '', 'nombre': '', 'apellido_paterno': '', 'apellido_paterno': ''},
                fillProduct: {'id': 0, 'slug': '', 'nombre': '', 'cantidad': '1', 'precio_actual': ''},
                details: [],
                tipo: '777',
                fecha: '',
                vendedor: '',
                forma_pago: '',
        		iva: 0,
        		subTotal: 0,
        		total: 0,
            }
        },
        mounted: function() {
            this.trabajadorAutocomplete();
        },
        methods: {
	        save: function() {
	        	var url = '/api/cotizacion';
	            axios.post(url, {
                    tipo: this.tipo,
                    fecha: this.fecha,
                    vendedor: this.vendedor,
                    forma_pago: this.forma_pago,
                    trabajador: this.fillTrabajador,
	            	iva: this.iva,
	            	subTotal: this.subTotal,
	            	total: this.total,
	            	trabajado_id: this.fillTrabajador.id,
	            	details: this.details
	            }).then(r => {
	                if (r.data.response) {
	                	window.location.href = '/admin/cotizacion/create';
	                }else{
	                	alert('Ocurrio un error...!!!');
	                }
	            });
	        },
            trabajadorAutocomplete: function(){

            	var self = this;
	            var trabajador = $("#trabajador"),
	            options = {
	                url: function(nombre) {
	                    return '/api/autocompleteTrabajador?palabra_a_buscar=' + nombre;
	                },
	                getValue: 'razon',
	                list: {
	                    onClickEvent: function() {
	                        var e = trabajador.getSelectedItemData();
	                        self.fillTrabajador.id = e.id;
	                        self.fillTrabajador.rut = e.rut;
	                        self.fillTrabajador.nombre = e.nombre;
	                        self.fillTrabajador.apellido_paterno = e.apellido_paterno;
	                        self.fillTrabajador.apellido_materno = e.apellido_materno;
	                    }
	                }
	            };

	            client.easyAutocomplete(options);
	        },

        }
    })
*/
