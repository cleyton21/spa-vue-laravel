<template>

    <LoginTemplate>

      <span slot="menuesquerdo">
       <img src="https://www.designerd.com.br/wp-content/uploads/2013/06/criar-rede-social.png" class="responsive-img" alt="">
      </span>

      <span slot="principal">

          <h2>Login</h2>
    
          <input type="text" placeholder="E-mail" v-model="email">
          <input type="password" placeholder="Senha" v-model="password">
          <button type="button" class="btn" v-on:click="login()">Entrar</button>
          <router-link class="btn orange" to="/cadastro">Cadastre-se</router-link>
          
      </span>

    </LoginTemplate>

</template>
  
  <script>
  import LoginTemplate from '@/templates/LoginTemplate'

  export default {
    name: 'Login',
    data () {
      return {
        email:'',
        password:''
      }
    },
    components: {
      LoginTemplate
    },
    methods:{
      login(){
        console.log('ok');
        this.$http.post(this.$urlAPI+'login' ,{
          email: this.email,
          password: this.password
        })
        .then(response => {
          //console.log(response)
          if(response.data.status) {
            //login com sucesso
            console.log('login com sucesso');
            //transforma o objeto json em string e salva no session storae do navegador
            //qnd fecha o navegador ele apaga
            sessionStorage.setItem('usuario',JSON.stringify(response.data.usuario));
            this.$router.push('/');
          }else if(response.data.status == false && response.data.validacao) {
            //login nao existe
            console.log('erros de validacao');
            let erros = '';
            for(let erro of Object.values(response.data.erros)) {
              erros += erro +" ";
            }
            alert(erros);
            
          }else{
            //erros de validacao
            console.log('login nao existe');
            alert('Ooops...Login inválido');
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
  