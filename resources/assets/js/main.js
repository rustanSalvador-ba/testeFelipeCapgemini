import Vue from 'vue/dist/vue.js'

import VueResource from 'vue-resource'

import VueContas from './components/contas.vue'

Vue.use(VueResource)

new Vue({

el:'.container',
     components: {
	             VueContas
                }
       })


$(document).ready(function(){
  $("#filtro").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#tabela tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});