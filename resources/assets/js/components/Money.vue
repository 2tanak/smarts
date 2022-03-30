<template>
    <div>
     <button @click="money" class="pay-btn">ОПЛАТИТЬ</button>

    </div>
</template>

<script>
    export default {
        mounted() {
           // console.log('Component mounted.')
        },
		methods:{
			money: function(event){
			event.target.style.background="transparent";

			event.target.innerHTML  = "<div class='loader'></div>";

				
			let price = $('.pay-price span').text();
		    let tovar = $('.mc-course-name').data('id');
            let token = $('meta[name="csrf-token"]').attr('content');
			   axios({
			     method: 'get', 
                 url: '/money',
				 params:{price: price,tovar: tovar,token: token},
                 headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              })
			.then(response => {
						console.log(response.data);return false;

              if(response.data.auth == 'no'){
				  				  document.location.href = '/login';

			  }
				var res = response.data;
	          var url = res.result.url;
			  document.location.href = url;
            })
			
				
			}
			
		}
    }
</script>
