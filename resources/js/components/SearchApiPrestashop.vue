<template>
    <div>
        <div class="row row justify-content-center">
            <div class="col-md-12">

                <form @submit.prevent="onSubmit">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <h1 class="mb-4" v-text="title"></h1>
                            <div class="form-inline input-group">

                                <input class="form-control" type="numeric"
                                    placeholder="Post code:"
                                    v-model="orders"
                                    >

                                <div class="btn-group px-2"
                                    role="group"
                                    aria-label="Roles"
                                    >
                                    <div class="btn-group" role="group">
                                        <select class="custom-select">
                                            <option selected>Status order</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>

                                <datepicker></datepicker>

                                <button class="btn btn-outline-primary ml-2" type="submit">
                                    Search
                                </button>
                            </div>
                        </div>

                        <!-- <div class="col-md-4">

                        </div> -->
                    </div>
                </form>
            </div>

            <div class="col-md-12 mt-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Identify</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div v-for="order in orders">
                            <tr>
                                <td>{{ order.identify}}</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                        </div>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from 'vuejs-datepicker';
import axios from 'axios'

export default {
    components: {
        Datepicker
    },
    data () {
        return {
            title: 'Buscar pedido por el estado del pedido, fecha de creación y código postal',
            orders: []
        }
    },
    methods: {
        onSubmit () {
                // alert(this.identify)
                this.loading = true
                this.reset()

                axios
                    .get("https://apitest.test/api/v1/orders-api")
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
