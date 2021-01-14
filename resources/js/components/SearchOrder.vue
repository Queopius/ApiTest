<template>
    <div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 v-text="title"></h1>
                <form class="text-center mt-4" @submit.prevent="onSubmit">
                    <div class="input-group mb-3">

                        <input type="search"
                            class="form-control"
                            placeholder="Identify order:"
                            aria-label="Recipient's username"
                            aria-describedby="button-addon2"
                            v-model="search"
                            >

                        <div class="input-group-append">
                            <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                Buscar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div v-if="error">
            <p>404 - Lo sentimos, este pedido no fue encontrado</p>
        </div>

        <section v-else>
            <div v-if="loading" class="justify-content-center">
                <img src="/assets/loading.gif" alt="Preloader..." width="350" height="250">
            </div>
            <div
                v-else
                v-for="order in orders.data"
                class="mt-5"
                >
                <div class="card">
                    <div class="card-header">
                        <h4><b>Identify:</b> {{ order.identify }}</h4>
                    </div>
                    <div class="card-body">
                        <h5><b>Client:</b> {{ order.client.name }}</h5>
                        <h5><b>Address:</b> {{ order.client.address.post_code }} {{ order.client.country.name }}</h5>
                        <h5 v-for="product in order.products">
                            <b>Product/s:</b> {{ product.name }}
                        </h5>
                        <h5><b>Status:</b> {{ order.status.name }}</h5>
                        <h5><b>Create at:</b> {{ order.created_at }}</h5>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import axios from 'axios';

    export default {
        data () {
            return {
                title: 'Buscar pedido por su identificación',
                orders: {
                    products: []
                },
                search: '',
                loading: false,
                error: ''
            }
        },
        methods: {
            onSubmit () {
                // alert(this.identify)
                this.loading = true
                this.reset()

                axios
                    .get("http://apitest.test/api/v1/orders", {
                        params: {
                            search: this.search
                        }
                    })
                    .then(response => {
                        console.log(response.data)

                        if (response.data.erro)
                            this.error = 'Invalid Identify!'
                        else
                            this.orders = response.data
                    })
                    .catch(error => {
                        console.log(error)
                        this.error = '404'
                    })
                    .finally(() => this.loading = false)
            },
            reset () {
                this.error = ''
                this.orders = {}
            }
        }
    };
</script>

<style scoped>

</style>
