
import easy_autocomplete from 'easy-autocomplete'

const apicotizacion = new Vue({
    el: '#apicotizacion',
		data: function() {
            return {
                token: App.api_token,
                errors: [],
                cotizacion: "",
                estado_cotizacion: 0,
                estados_cotizacion: [
                    { id : 0, nombre : "Pendiente"},
                    { id : 1, nombre : "Adjudicada"},
                    { id : 2, nombre : "Nula"}
                ],

                fecha: null,
                vendedor: null,
                forma_pago: null,
                fillClient: {'id': 0, 'rut': '', 'razon': '', 'giro': '', 'address': ''},
                fillProduct: {'id': 0, 'slug': '', 'nombre': '', 'cantidad': '1', 'precio_actual': '', 'valor_descuento':'0', 'total':'0' },
                details: [],
                tipo: '777',
        		iva: 0,
        		subTotal: 0,
        		total: 0,

            }
        },
        mounted: function() {

            this.clientAutocomplete();
            this.productAutocomplete();
        },
        methods: {
            cargarEstadoCotizacion: function(cotizacion) {
                this.cotizacion = cotizacion;
                this.estado_cotizacion = cotizacion.estado_id;
            },
            updateEstadoCotizacion: function() {
                //actualizar estado de cotizacion segun el id

                let headers = new Headers({
                    'Authorization':  'Bearer ' + this.token
                });

                headers['Authorization'] = 'Bearer '+ this.token;

                let me = this;
                let datos = {
                    'id': this.cotizacion.id,
                    'nuevoEstado': this.estado_cotizacion
                };

                axios.put('/api/actualizarCotizacion',datos, {headers} ).then(function (response) {
                    if (response.status) {
                        window.location.href = '/admin/cotizacion';
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });
            },

            checkForm: function () {
                this.errors = [];

                if (!this.fecha) {
                    this.errors.push('La fecha es obligatoria.');
                }
                if (!this.fillClient) {
                    this.errors.push('El cliente es obligatorio.');
                }
                if (!this.forma_pago) {
                    this.errors.push('La forma de pago es obligatoria.');
                }
                if (!this.vendedor) {
                    this.errors.push('El vendedor es obligatorio.');
                }

                if (this.errors.length > 0) {
                    return true;
                }

                return false;

                //e.preventDefault();
            },
        	removeProductFromDetail: function(item) {
	            var index = this.details.indexOf(item);
	            this.details.splice(index, 1);
	            this.calculate();
	        },
        	addProductToDetail: function() {
	            this.details.push({
	                id: this.fillProduct.id,
	                slug: this.fillProduct.slug,
	                nombre: this.fillProduct.nombre,
	                cantidad: parseInt(this.fillProduct.cantidad),
	                precio_actual: parseInt(this.fillProduct.precio_actual),
	                valor_descuento: parseInt(this.fillProduct.valor_descuento),
	                total: parseInt((this.fillProduct.precio_actual * this.fillProduct.cantidad) - this.fillProduct.valor_descuento)
	            });

	            this.fillProduct = {'id': 0, 'slug': '', 'nombre': '', 'cantidad': '', 'precio_actual': '', 'valor_descuento':'0', 'total':''};

	            this.calculate();
	        },
	        save: function() {
                if (!this.checkForm()) {
                    this.errors = [];

                    let headers = new Headers({
                        'Authorization':  'Bearer ' + this.token
                    });

                    headers['Authorization'] = 'Bearer '+ this.token;

                    let datos = {
                        tipo: this.tipo,
                        fecha: this.fecha,
                        vendedor: this.vendedor,
                        forma_pago: this.forma_pago,
                        cliente: this.fillClient,
    	            	iva: this.iva,
    	            	subTotal: this.subTotal,
    	            	total: this.total,
    	            	client_id: this.fillClient.id,
    	            	details: this.details
                    };

    	        	var url = '/api/cotizacion';
    	            axios.post(url, datos, {headers}).then(r => {
    	                if (r.data.response) {
    	                	window.location.href = '/admin/cotizacion';
    	                }else{
    	                	alert('Ocurrio un error...!!!');
    	                }
    	            });
                }
	        },
            calcularLinea: function() {
                this.fillProduct.total = (this.fillProduct.cantidad * this.fillProduct.precio_actual)- this.fillProduct.valor_descuento;

                if (this.fillProduct.total < 0) {
                    this.fillProduct.valor_descuento = 0;

                    this.fillProduct.total = (this.fillProduct.cantidad * this.fillProduct.precio_actual)- this.fillProduct.valor_descuento;

                    Swal.fire({
                      icon: 'error',
                      title: 'Oops...',
                      text: 'No puede descontar el total'
                    });
                }


            },
	        calculate: function() {
	            var subTotal = 0;

	            /*this.details.forEach(function(e){
	                total += e.total;
	            });*/
                this.details.forEach(function(e){
	                subTotal += e.total;
	            });

	            //this.subTotal = parseFloat(total / 1.19);
	            this.subTotal = parseInt(subTotal);
	            this.iva = parseInt(this.subTotal * 0.19);
                this.total = parseInt(this.iva + this.subTotal);
	        },
            clientAutocomplete: function(){

            	var self = this;
	            var client = $("#client"),
	            options = {
	                url: function(razon) {
	                    return '/api/autocompleteCliente?palabra_a_buscar=' + razon;
	                },
	                getValue: 'razon',
                    ajaxSettings: {
                		beforeSend: function(xhr) {
                			xhr.setRequestHeader("Authorization", `Bearer `+self.token );
                		},
                	},
	                list: {
	                    onClickEvent: function() {
	                        var e = client.getSelectedItemData();
	                        self.fillClient.id = e.id;
	                        self.fillClient.rut = e.rut;
	                        self.fillClient.razon = e.razon;
	                        self.fillClient.giro = e.giro;
	                        self.fillClient.address = e.address;
	                    }
	                }
	            };

	            client.easyAutocomplete(options);
	        },
	        productAutocomplete: function(){
	        	var self = this;
	            var product = $("#product"),
	                options = {
	                url: function(nombre) {
	                    return '/api/autocompleteProducto?palabra_a_buscar=' + nombre;
	                },
	                getValue: 'nombre',
                    ajaxSettings: {
                		beforeSend: function(xhr) {
                			xhr.setRequestHeader("Authorization", `Bearer ` + self.token );
                		},
                	},
	                list: {
	                    onClickEvent: function() {
	                        var e = product.getSelectedItemData();
	                        self.fillProduct.id = e.id;
	                        self.fillProduct.slug = e.slug;
	                        self.fillProduct.nombre = e.nombre;
	                        self.fillProduct.cantidad = 1;
	                        self.fillProduct.precio_actual = e.precio_actual;
	                        self.fillProduct.total = 1 * e.precio_actual;
	                    }
	                }
	            };

	            product.easyAutocomplete(options);
	        }
        }
    })
