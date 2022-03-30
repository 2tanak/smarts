<template>
    <div>
        
		<div class="col-lg-4 first-side" id="first-side">
          <div class="sign-logo" id="sign-logo">
            <img src="images/logo-white.png">
          </div>
          <div class="sign-text div-center">
            <h4 id="sign-text">Добро пожаловать</h4>
          </div>
          <div class="div-center">
          <button class="sign-btn" onclick="Test()" id="sign-btn">РЕГИСТРАЦИЯ</button></div>
        </div>
		
		
		
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
