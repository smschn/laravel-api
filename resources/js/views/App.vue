<!--
    componente globale:
    funge da involucro per tutta la parte della web app accessibile a chi NON ha effettuato il login.
    qui importo, registro ed uso gli altri componenti creati per questa parte del sito pubblicamente accessibile.
-->

<template>
    <div>
        <MyHeader />
    </div>
</template>

<script>
    // importo i componenti
    import MyHeader from '../components/MyHeader.vue';

    export default {
        name: 'App',
        components: {
            MyHeader
        }
    }
</script>