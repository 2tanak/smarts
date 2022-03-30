<template>
<div>
<div v-if="loader">
{{ load(true) }}
</div>
<div v-else="loader">
{{ load(false) }}
</div>
</div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
		method:{
		load(param){
			  if(param == true){
				  	//$('.overlay').removeClass('over');
					
									  $('.overlay').addClass('over');


			  }else{


			  }
		  },
		  
		}
    }
</script>
