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
        <p>
          <grid-vue v-if="conteudo.titulo && conteudo.texto" class="btn waves-effect waves-light" tamanho="2 offset-s10">Publicar</grid-vue>
        </p>
    </div>
</template>
    
    <script>
    import GridVue from '@/components/layouts/GridVue'

    export default {
      name: 'PublicarConteudoVue',
      props: [],
      data () {
        return {
          conteudo:{titulo:'', texto:'', link:'', imagem:''}
        }
      },
      components: {
        GridVue
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
    