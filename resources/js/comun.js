
window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);



if (document.getElementById('app')) {
    const app = new Vue({
        el: '#app',
    });
}

if (document.getElementById('apiempresa')) {
    require('./admin/apiempresa');
}
if (document.getElementById('apicategory')) {
    require('./admin/apicategory');
}
if (document.getElementById('apiliquidacion')) {
    require('./admin/apiliquidacion');
}
if (document.getElementById('apidepartamento')) {
    require('./admin/apidepartamento');
}
if (document.getElementById('apibodega')) {
    require('./admin/apibodega');
}
if (document.getElementById('apisucursal')) {
    require('./admin/apisucursal');
}
if (document.getElementById('apicargo')) {
    require('./admin/apicargo');
}

if (document.getElementById('apitienda')) {
    require('./tienda/apitienda');
}

if (document.getElementById('apiuser')) {
    require('./admin/apiuser');
}
if (document.getElementById('apipermiso')) {
    require('./admin/apipermiso');
}
if (document.getElementById('apirole')) {
    require('./admin/apirole');
}

if (document.getElementById('apicliente')) {
    require('./admin/apicliente');
}
if (document.getElementById('apiproveedor')) {
    require('./admin/apiproveedor');
}
if (document.getElementById('apiproduct')) {
    require('./admin/apiproduct');
}
if (document.getElementById('apivendedor')) {
    require('./admin/apivendedor');
}
if (document.getElementById('api_sku')) {
    require('./admin/api_sku');
}

if (document.getElementById('confirmareliminar')) {
    require('./confirmareliminar');
}

if (document.getElementById('api_search_autocomplete')) {
    require('./admin/api_search_autocomplete');
}

if (document.getElementById('apimovimiento')) {
    require('./admin/apimovimiento');
}
if (document.getElementById('apicotizacion')) {
    require('./admin/apicotizacion');
}
if (document.getElementById('apifactura')) {
    require('./admin/apifactura');
}
if (document.getElementById('apiNotaVenta')) {
    require('./admin/apiNotaVenta');
}
