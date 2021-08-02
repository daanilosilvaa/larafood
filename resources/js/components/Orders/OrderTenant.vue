<template>
    <div>
        <div class="card-header">
            <form action="#">
                <label for="status">Status:</label>
                <select name="status" class="form-control" v-model="status">
                    <option value="all">Todos</option>
                    <option value="open">Aberto</option>
                    <option value="done">Completo</option>
                    <option value="rejected">Rejeitado</option>
                    <option value="working">Andamento</option>
                    <option value="canceled">Cancelado</option>
                    <option value="delivering">Em transito</option>
                </select>
                <div class="form-group">
                    <label for="date">Data:</label>
                    <input type="date" class="form-control" v-model='dateFilter' id="">
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Número</th>
                        <th>Status</th>
                        <th>Data</th>
                        <th with="270">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(order, index) in orders.data" :key="index">
                        <td>{{ order.identify }}</td>
                        <td>{{ order.status_label }}</td>
                        <td>{{ order.date }}</td>
                        <td>
                            <a href="#" @click.prevent="openDetails(order)"></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div v-if="loadingOrders">Carregando seus pedidos</div>
            <div v-else-if="orders.data.length == 0">Nenhum Pedido</div>
        </div>

        <detail-order : order="order" :display="displayOrder"></detail-order>

    </div>
</template>
<script>
import Bus from '../../bus'

import DetailOrder from './_partials/DetailsOrder'
export default {
    mounted() {
        this.getOrders()

        Bus.$on('order.created', (order) => {
            this.order.data.unshift(order)
        })
    },
    data() {
        return {
            orders: {
                data: []
            },
            loadingOrders: false,
        }
    },

}
</script>
