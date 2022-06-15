
import easy_autocomplete from 'easy-autocomplete'

const apimovimiento = new Vue({
    el: '#apimovimiento',
		data: function() {
            return {
                token: App.api_token,
                fillSku: {'id': 0, 'slug': '', 'nombre': '', 'cantidad': '1', 'precio_actual': '','costo': 0},
                details: [],
                tipo: '500',
                fecha: new Date(),
                bodega_id: '',
                tipo_id: '',

        		total: 0,
            }
        },
        mounted: function() {
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
	                id: this.fillSku.id,
	                slug: this.fillSku.slug,
	                nombre: this.fillSku.nombre,
	                cantidad: parseInt(this.fillSku.cantidad),
	                precio_actual: parseInt(this.fillSku.precio_actual),
	                costo: parseInt(this.fillSku.costo),
	                total: parseInt(this.fillSku.precio_actual * this.fillSku.cantidad)
	            });

	            this.fillSku = {'id': 0, 'slug': '', 'nombre': '', 'cantidad': '', 'precio_actual': '','costo': ''};

	            this.calculate();
	        },
	        save: function() {
	        	var url = '/api/movimiento';

                let headers = new Headers({
                    'Authorization':  'Bearer ' + this.token
                });

                headers['Authorization'] = 'Bearer '+ this.token;

                let datos = {
                    tipo: this.tipo,
                    fecha: this.fecha,
                    bodega_id: this.bodega_id,
                    tipo_id: this.tipo_id,
	            	details: this.details
                };

	            axios.post(url, datos, {headers}).then(r => {
	                if (r.data.response) {
	                	window.location.href = '/admin/movimiento/create';
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

                this.total = parseInt(this.subTotal);
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
                			xhr.setRequestHeader("Authorization", `Bearer `+self.token );
                		},
                	},
	                list: {
	                    onClickEvent: function() {
	                        var e = product.getSelectedItemData();
	                        self.fillSku.id = e.id;
	                        self.fillSku.slug = e.slug;
	                        self.fillSku.nombre = e.nombre;
	                        self.fillSku.cantidad = 1;
	                        self.fillSku.precio_actual = e.precio_actual;
	                    }
	                }
	            };

	            product.easyAutocomplete(options);
	        }
        }
    })
