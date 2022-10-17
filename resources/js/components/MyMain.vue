<template>
    <div class="container">
        <h1 class="mb-3">Posts list</h1>
        <!-- loader con if -->
        <div v-if="loading" class="d-flex justify-content-center">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- lista post con else (a fine risposta api viene mostrata questa lista) -->
        <div v-else class="row">
            <div class="card col-12 mb-3" v-for="(post, index) in posts" v-bind:key="index">
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <!--
                        ricorda: prima serve ricostruire le relazioni nella api con il metodo statico ::with.
                        poi, con operatore ternario verifico presenza categoria e stampo di conseguenza.
                        -->
                    <p class="card-text">{{post.category?post.category.name:'-'}}</p>
                    <!-- per mezzo di una funzione taglio il testo del contenuto -->
                    <p class="card-text">{{truncateText(post.content, 15)}}</p>
                    <a href="#" class="btn btn-primary">Read more...</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'MyMain',
    data() {
        return {
            posts: [],
            loading: true, // variabile per mostrare un loader
        }
    },
    methods: {
        // metodo per catturare i post dalla api tramite axios.
        getPosts() {

            // ad ogni chiamata axios setto il loader su true per farlo apparire in pagina.
            this.loading = true;

            // per sapere l'url da contattare, controllare la lista delle routes con: php artisan route:list.
            axios.get('/api/posts')
            .then( (response) => {
                this.posts = response.data.results;
                this.loading = false; // setto il loader a false una volta ricevuta la risposta dall'api.
            })
        },
        // metodo per tagliare il testo di un contenuto che superi una lunghezza decisa da me.
        truncateText(text, maxLength) {
            if (text.length < maxLength) {
                return text;
            } else {
                return text.substring(0, maxLength) + '...';
            }
        }
    },
    mounted() {
        // lancio la chiamata api al montaggio dell'istanza di vue.
        this.getPosts();
    }
}
</script>

<style>

</style>