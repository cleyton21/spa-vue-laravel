<template>

    <LoginTemplate>

      <span slot="menuesquerdo">
       <img src="https://www.designerd.com.br/wp-content/uploads/2013/06/criar-rede-social.png" class="responsive-img" alt="">
      </span>

      <span slot="principal">

          <h2>Cadastro</h2>
    
          <input type="text" placeholder="Nome" v-model="name">
          <input type="text" placeholder="E-mail" v-model="email">
          <input type="password" placeholder="Senha" v-model="password">
          <input type="password" placeholder="Confirme sua Senha" v-model="password_confirmation">
          <button type="button" class="btn" v-on:click="cadastro()">Enviar</button>
          <router-link class="btn orange" to="login">Já tenho conta</router-link>

        </span>
          
    </LoginTemplate>

</template>
  
  <script>
  import LoginTemplate from '@/templates/LoginTemplate'

  export default {
    name: 'Cadastro',
    data () {
      return {
        name:'',
        email:'',
        password:'',
        password_confirmation:''
      }
    },
    components: {
      LoginTemplate
    },
    methods:{
      cadastro(){
        console.log('ok');
        this.$http.post(this.$urlAPI+'cadastro' ,{
          name: this.name,
          email: this.email,
          password: this.password,
          password_confirmation: this.password_confirmation
        })
        .then(response => {
          //console.log(response)
          if(response.data.status) {
            //login com sucesso
            console.log('Cadastro realizado com sucesso');
            //transforma o objeto json em string e salva no session storae do navegador
            //qnd fecha o navegador ele apaga
            sessionStorage.setItem('usuario',JSON.stringify(response.data.usuario));
            this.$router.push('/');
          }else if(response.data.status == false && response.data.validacao) {
            //erros de validacao
            console.log('erros de validacao');
            let erros = '';
            for(let erro of Object.values(response.data.erros)) {
              erros += erro +" ";
            }
            alert(erros);
          }else{
            alert('Ooops...Erro no cadastro! Tente novamente mais tarde!');
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
  