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
  import axios from 'axios'


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
        axios.post('http://127.0.0.1:8000/api/login' ,{
          email: this.email,
          password: this.password
        })
        .then(response => {
          console.log(response)
        })
        .catch(e => {
          console.log(e)
        })
      }
    }
  }
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style scoped>
  
  </style>
  