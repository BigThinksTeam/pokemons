<template>
    <section>
        <div class="d-flex flex-column justify-content-center align-items-center">
            <v-progress-circular :size="250" :width="17" color="red" indeterminate v-if="loading"></v-progress-circular>
        </div>
        <div class="bre">

        </div>
        <div class="d-flex flex-column justify-content-center align-items-center p-4" v-if="pokemon.abilities">
            <div class="card">
                <div class="card-header d-flex flex-row justify-content-center align-items-center">
                    <img class="card-img" :src="pokemon.sprites.other.dream_world.front_default" style="width: 15rem">
                </div>
                <div class="card-body flex-row d-flex" style="width: 400px">
                    <div>
                        <span class="font-weight-bold">Abilities:</span>
                        <div class="ml-2" v-for="(ability, index) in pokemon.abilities" :key="index">
                            <span>{{ability.ability.name}}</span>
                        </div>
                    </div>
                    <div class="mx-4">
                        <span class="font-weight-bold">Moves:</span>
                        <div class="ml-2" v-for="(move, index) in pokemon.moves" :key="index">
                            <span>{{move.move.name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>

<script>
    export default {
        name: "only_pokemon",
        props:['poke'],
        data(){
            return {
                loading: false,
                pokemon:{},
                description:'',
                characteristic: ''
            }
        },
        mounted() {
            if(this.poke > 0){
                this.getPokemon()
            }else{}
        },
        methods:{
            back(){
                this.$parent.view_list_poke = true
            },
            getPokemon(){
                this.loading = true
                axios.get(`https://pokeapi.co/api/v2/pokemon/${this.poke}`).then(res => {
                    this.pokemon = res.data
                    this.getCharacteristic()
                    this.loading = false

                })
            },
            getCharacteristic(){
                axios.get(`https://pokeapi.co/api/v2/characteristic/${this.pokemon.id}/`).then(res=>{
                    this.characteristic = res.data
                    console.log(res.data)
                }).catch(err=>{})
            }
        }
    }
</script>
