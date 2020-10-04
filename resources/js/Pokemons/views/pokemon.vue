<template>
    <section>
        <div class="content d-flex flex-column p-4" v-if="view_list_poke">
            <div  class="d-flex flex-row flex-wrap justify-content-center align-items-center">
                <div v-for="(pokemon, index) in pokemons" :key="index" v-if="!loading">
                    <div class="card" style="width:400px">
                        <div class="card-body">
                            <h4 class="card-title">{{pokemon.name}}</h4>
                            <a href="#" class="btn btn-danger" @click="showAbility(pokemon.url)">See Pokemon</a>
                        </div>
                    </div>
                </div>
                <v-progress-circular :size="250" :width="17" color="red" indeterminate v-if="loading"></v-progress-circular>
            </div>
            <div class="d-flex justify-content-center align-items-center py-4">
                <span class="btn border-danger text-danger" @click="lastPaginate">LAST</span>
                <span class="btn border-danger text-danger mx-2" @click="nextPaginate">NEXT</span>
            </div>
        </div>
        <only_pokemon :pokemon="pokemon" v-if="!view_list_poke"></only_pokemon>
    </section>
</template>

<script>
import Only_pokemon from "../components/only_pokemon";
export default {
    components: {Only_pokemon},
    data(){
        return {
            pokemons:[],
            response:'',
            loading: false,
            view_list_poke: true,
            pokemon: null
        }
    },
    mounted(){
        this.getPokemons()
    },
    methods:{
        getPokemons(){
            this.loading = true
            axios.get('https://pokeapi.co/api/v2/pokemon/').then(res => {
                this.pokemons = res.data.results
                this.response = res.data
                this.loading = false
            }).catch(err =>{})
        },
        nextPaginate(){
            this.loading = true
            axios.get(this.response.next).then(res =>{
                this.pokemons = res.data.results
                this.response = res.data
                this.loading = false
            }).catch(err =>{})
        },
        lastPaginate(){
            this.loading = true
            axios.get(this.response.previous).then(res =>{
                this.pokemons = res.data.results
                this.response = res.data
                this.loading = false
            }).catch(err =>{})
        },
        showAbility(url){
            this.loading = true
            axios.get(url).then(res =>{
                this.loading = false
                this.pokemon = res.data
                // this.view_list_poke = false
                window.location.replace(`/get/Pokemon/${this.pokemon.id}`)
            }).catch(err => {
                console.log(err)
            })
        }
    }
}
</script>
