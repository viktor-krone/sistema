
import easy_autocomplete from 'easy-autocomplete'

const apiNotaVenta = new Vue({
    el: '#apiNotaVenta',
		data: function() {
            return {
                fillClient: {'id': 0, 'rut': '', 'razon': '', 'giro': '', 'address': ''},
                fillProduct: {'id': 0, 'slug': '', 'nombre': '', 'cantidad': '1', 'precio_actual': ''},
                details: [],
                tipo: '780',
                fecha: '',
                vendedor: '',
                forma_pago: '',
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
	                total: parseInt(this.fillProduct.precio_actual * this.fillProduct.cantidad)
	            });

	            this.fillProduct = {'id': 0, 'slug': '', 'nombre': '', 'cantidad': '', 'precio_actual': ''};

	            this.calculate();
	        },
	        save: function() {
	        	var url = '/api/notaventa';
	            axios.post(url, {
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
	            }).then(r => {
	                if (r.data.response) {
	                	window.location.href = '/admin/notaventa/create';
	                }else{
	                	alert('Ocurrio un error...!!!');
	                }
	            });
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
	                list: {
	                    onClickEvent: function() {
	                        var e = product.getSelectedItemData();
	                        self.fillProduct.id = e.id;
	                        self.fillProduct.slug = e.slug;
	                        self.fillProduct.nombre = e.nombre;
	                        self.fillProduct.cantidad = 1;
	                        self.fillProduct.precio_actual = e.precio_actual;
	                    }
	                }
	            };

	            product.easyAutocomplete(options);
	        }
        }
    })
