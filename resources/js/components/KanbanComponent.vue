<template>
    <div>
        <span v-if="loading">carregando...</span>
        <div v-else>
            #{{ kanban.id }}: <h1>{{ kanban.title }}</h1>

            <table>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Total de Leads</th>
                    </tr>
                </thead>
                <tbody>
                <tr :key="i" v-for="board, i in kanban.lists">
                        <td>{{ board.title }}</td>
                        <td>{{ board.cards.length }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            loading: true,
            kanban: []
        }
    },
    mounted() {
        this.requestList();
    },
    methods: {
        async requestList () {
            this.loading = true;

            //-> read network payload
            const { data } = await axios.get('https://demo0948629.mockable.io/api/kanban');
            this.kanban = data.boards;

            this.loading = false;
        }
    }
}
</script>
