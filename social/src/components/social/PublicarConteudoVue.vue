<template>    
    <div class="row">
        <grid-vue class="input-field" tamanho="12">
          <input type="text" v-model="conteudo.titulo">
          <textarea v-if="conteudo.titulo" placeholder="Conteudo" v-model="conteudo.texto" class="materialize-textarea"></textarea>
          <input v-if="conteudo.titulo && conteudo.texto" type="text" placeholder="Link" v-model="conteudo.link">
          <input v-if="conteudo.titulo && conteudo.texto" type="text" placeholder="Url da Imagem" v-model="conteudo.imagem">
          <!-- <label>O que está acontecendo?</label> -->
          <label :class="{ 'active': conteudo.titulo || conteudo.texto || conteudo.link || conteudo.imagem }">O que está acontecendo?</label>

        </grid-vue> 
        <p class="right-align">
          <button @click="addConteudo()" v-if="conteudo.titulo && conteudo.texto" class="btn waves-effect waves-light">Publicar</button>
        </p>
    </div>
</template>
    
    <script>
    import GridVue from '@/components/layouts/GridVue'

    export default {
      name: 'PublicarConteudoVue',
      props: ['usuario'],
      data () {
        return {
          conteudo:{titulo:'', texto:'', link:'', imagem:''}
        }
      },
      components: {
        GridVue
      },
      methods:{
        addConteudo(){
          console.log(this.conteudo);
          this.$http.post(this.$urlAPI+'conteudo/adicionar',{
            titulo: this.conteudo.titulo,
            texto: this.conteudo.texto,
            link: this.conteudo.link,
            imagem: this.conteudo.imagem,
          },
          {"headers":{"authorization":"Bearer "+this.usuario.token}}).then(response => {
             if(response.data.status){
              console.log(response.data.conteudos);
             }
          })
        }
      }
    }
    </script>
    
    <!-- Add "scoped" attribute to limit CSS to this component only -->
    <style scoped>
    .label.active {
      transform: translateY(-1.5em);
      font-size: 0.8em;
      transition: transform 0.3s ease-in-out, font-size 0.3s ease-in-out;
    }
    </style>
    