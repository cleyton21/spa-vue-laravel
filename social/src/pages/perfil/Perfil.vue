<template>

    <SiteTemplate>

      <span slot="menuesquerdo">
       <img src="https://www.designerd.com.br/wp-content/uploads/2013/06/criar-rede-social.png" class="responsive-img" alt="">
      </span>

      <span slot="principal">

          <h2>Perfil</h2>
    
          <input type="text" placeholder="Nome" v-model="name">
          <input type="text" placeholder="E-mail" v-model="email">

          <div class="file-field input-field">
            <div class="btn">
              <span>Imagem</span>
              <input type="file">
            </div>
            <div class="file-path-wrapper">
              <input class="file-path validate" type="text">
            </div>
          </div>

          <input type="password" placeholder="Senha" v-model="password">
          <input type="password" placeholder="Confirme sua Senha" v-model="password_confirmation">
          <button type="button" class="btn" v-on:click="perfil()">Atualizar</button>

        </span>
          
    </SiteTemplate>

</template>
  
  <script>
  import SiteTemplate from '@/templates/SiteTemplate'
  import axios from 'axios';

  export default {
    name: 'Perfil',
    data () {
      return {
        usuario:false,
        name:'',
        email:'',
        password:'',
        password_confirmation:''
      }
    },
    created(){
      let usuarioAux = sessionStorage.getItem('usuario');
      if(usuarioAux) {
        //pega a string que esta salva em local storage e transforma em objeto vovamnete pra usar
        this.usuario = JSON.parse(usuarioAux);
        this.name = this.usuario.name;
        this.email = this.usuario.email;
      }
    },
    components: {
      SiteTemplate
    },
    methods:{
      perfil(){
        console.log('ok');
        axios.post('http://127.0.0.1:8000/api/perfil' ,{
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        })
        .then(response => {
          //console.log(response)
          if(response.data.token) {
            //login com sucesso
            console.log('Cadastro realizado com sucesso');
            //transforma o objeto json em string e salva no session storae do navegador
            //qnd fecha o navegador ele apaga
            sessionStorage.setItem('usuario',JSON.stringify(response.data));
            this.$router.push('/');
          }else if(response.data.status == false) {
            //login nao existe
            alert('Ooops...Erro no cadastro! Tente novamente mais tarde!');
          }else{
            //erros de validacao
            console.log('erros de validacao');
            let erros = '';
            for(let erro of Object.values(response.data)) {
              erros += erro +" ";
            }
            alert(erros);
          }
        })
        .catch(e => {
          console.log(e)
          alert("Erro...Tente novamente mais tarde!");
        })
      }
    }
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  
  </style>
  