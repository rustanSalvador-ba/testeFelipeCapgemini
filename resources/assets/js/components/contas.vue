<script>
export default{
	props:['conta'],
    	data(){
	       return{
     	       list:[],
     	       filter:'',
	           valor:'0'
	             }
	           },

	    methods:{

          creditar(ev, item){
            ev.preventDefault()
            this.valor=this.$refs.valor.value
           	this.$http.get('/creditar/'+item.id+'/'+this.valor).then(req=>(this.$set(item, 'saldo', req.data.valor)))
                    },
	
           debitar(ev, item){
             ev.preventDefault()
             this.valor=this.$refs.valor.value
   	         this.$http.get('/debitar/'+item.id+'/'+this.valor).then(req=>(this.$set(item, 'saldo', req.data.valor)))
                    }

        },

	    mounted(){
	       this.list=JSON.parse(this.conta)
	      }
}
</script>
<template>
<div>

<div class="container">

<h1> Contas </h1>
    <div class="form-group">
    <label for="filtro">Nome do Titular </label>
     <input class="form-control col-md-6" id="filtro" type="text" placeholder="Pesquise o nome aqui..">
         <label for="valor">Valor da Operação </label>
     <input type='text' id="valor" class="form-control col-md-2" placeholder="Digite o valor.." ref="valor">
    </div>  
                                                                                       
  <div class="table-responsive">          
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>Conta</th>
        <th>Nome</th>
        <th>Saldo</th>
        <th>Crédito</th>
        <th>Débito</th>
      </tr>
    </thead>
    <tbody id="tabela">
    
      <tr v-for="c in list">
        <td>{{c.id}}</td>
        <td>{{c.nome}}</td>
        <td>R${{c.saldo}}</td>
        <td> <a href='#' @click="creditar($event, c)">Creditar</a></td>
        <td> <a href='#' @click="debitar($event, c)">Debitar</a></td>
      </tr>
    </tbody>
  </table>
  </div>
</div>
</div>
</template>

<style scoped=""></style>