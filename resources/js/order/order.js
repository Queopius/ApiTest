import axios from 'axios'

const app = new Vue({
    el: '#app',
    created() {

        this.getOrders();

    },
    data: {
        orders: [],
        search: '',
        setTimeoutSearch: ''
    },
    methods: {

        getOrders() {

            axios.get('/orders', {
                params: {
                    search: this.search
                }
            })
                .then( res => {
                    this.orders = res.orders;
                })
                .catch( error => {
                    console.log( error.response )
                });
        },

        searchOrders() {

            clearTimeout( this.setTimeoutSearch )
            this.setTimeoutSearch = setTimeout(this.getOrders, 360)
        }
    }
});
