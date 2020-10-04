require('./bootstrap');

import vue from 'vue'

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'

vue.use(Vuetify)

import pokemon from './Pokemons/views/pokemon'
import Only_pokemon from "../js/Pokemons/components/only_pokemon";

new vue({
    el: '#app',
    components:{
        pokemon,
        Only_pokemon
    }
})
