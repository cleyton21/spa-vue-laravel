<template>

    <SiteTemplate>

      <span slot="menuesquerdo">
        <div class="row valign-wrapper">
          <grid-vue tamanho="4">
            <img :src="usuario.imagem" :alt="usuario.name" class="circle responsive-img"> <!-- notice the "circle" class -->
          </grid-vue>
          <grid-vue tamanho="8">
            <span class="black-text">
              <h5>{{ usuario.name }}</h5>
            </span>
          </grid-vue>
        </div>
      </span>

      <span slot="principal">
        <PublicarConteudoVue :usuario="usuario"/>
      
        <CardConteudoVue 
          perfil="https://materializecss.com/images/yuna.jpg"
          nome="Maria Silva"
          data="13/01/23 13:30">
    
            <card-detalhe-vue 
              img="https://materializecss.com/images/sample-1.jpg" 
              titulo="" 
              txt="I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively."/>
        </CardConteudoVue>
      </span>

    </SiteTemplate>

</template>
  
  <script>
  import SiteTemplate from '@/templates/SiteTemplate'
  import CardConteudoVue from '@/components/social/CardConteudoVue'
  import CardDetalheVue from '@/components/social/CardDetalheVue'
  import PublicarConteudoVue from '@/components/social/PublicarConteudoVue'
  import GridVue from '@/components/layouts/GridVue'

  export default {
    name: 'Home',
    data () {
      return {
        usuario:false
      }
    },
    //verifica se está logado e pega os dados salvos em sessionstorage
    created(){
      let usuarioAux = sessionStorage.getItem('usuario');
      if(usuarioAux) {
        //pega a string que esta salva em local storage e transforma em objeto vovamnete pra usar
        this.usuario = JSON.parse(usuarioAux);
      }
    },
    components: {
      SiteTemplate,
      CardConteudoVue,
      CardDetalheVue,
      PublicarConteudoVue,
      GridVue
    }
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  
  </style>
  