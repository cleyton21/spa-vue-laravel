<template>
    <span>
      <header>
        <nav-bar logo="Social" url="/" cor="green darken-1">
          <li v-if="!usuario"><router-link to="/login">Entrar</router-link></li>
          <li v-if="!usuario"><router-link to="/cadastro">Cadastre-se</router-link></li>
          <li v-if="usuario"><router-link to="/perfil">{{ usuario.name }}</router-link></li>
          <li v-if="usuario"><a v-on:click="sair()">Sair</a></li>
        </nav-bar>
      </header>
  
      <main>
        <div class="container">
          <div class="row">
            
            <grid-vue tamanho="8">
                <card-menu-vue>
                  <slot name="menuesquerdo" />
                </card-menu-vue>              
            </grid-vue>
            <grid-vue tamanho="4">
              <slot name="principal" />
            </grid-vue>
          </div>       
        </div>
      </main>
  
      <footer-vue cor="green darken-1" logo="Social" descricao="Teste de descrição" ano="2023">
        <li><a class="grey-text text-lighten-3" href="#!">Home</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
        <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
      </footer-vue>
  
    </span>
  </template>
  
  <script>
  import NavBar from '@/components/layouts/NavBar.vue'
  import FooterVue from '@/components/layouts/FooterVue'
  import GridVue from '@/components/layouts/GridVue'
  import CardMenuVue from '@/components/layouts/CardMenuVue'
  export default {
    name: 'LoginTemplate',
    data() {
      return {
        usuario: false
      }
    },
    components: {
      NavBar,
      FooterVue,
      GridVue,
      CardMenuVue
    },
    //metodo criado sempre que o componente é criado
    created(){
      console.log('created()');
      let usuarioAux = sessionStorage.getItem('usuario');
      if(usuarioAux) {
        //pega a string que esta salva em local storage e transforma em objeto vovamnete pra usar
        this.usuario = JSON.parse(usuarioAux);
        this.$router.push('/');
      }
    },
    methods:{
      sair(){
        sessionStorage.clear();
        this.usuario = false;
      }
    }
  }
  </script>
  
  <style>
  
  </style>
  