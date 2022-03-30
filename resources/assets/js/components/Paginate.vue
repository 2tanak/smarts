<template>
    <div>
             <div class="filter">
			  <h5 class="filter-title">
             ФИЛЬТР
             </h5>

		<div class="filter-type">
            <select @change="kurs" >
              <option some-data="key" v-for="(item, key) in filters" :value="key">
			    {{item}}
				</option>
              </select>
            <div class="select-icon">
              <img src="images/more.png">
            </div>
          </div>
		  
		  	<div class="filter-type">
              <select>
                <option>10-15 уроков</option>
                <option>10-15 уроков</option>
                <option>10-15 уроков</option>
                <option>10-15 уроков</option>
                <option>10-15 уроков</option>
              </select>
              <div class="select-icon">
                <img src="images/more.png">
              </div>
            </div>
		  
		  			
		  <div class="filter-type">
                <select>
                  <option>от 15 000 KZT</option>
                  <option>от 15 000 KZT</option>
                  <option>от 15 000 KZT</option>
                  <option>от 15 000 KZT</option>
                  <option>от 15 000 KZT</option>
                </select>
                <div class="select-icon">
                  <img src="images/more.png">
                </div>
              </div>
		  
		  
		</div>
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		

			
<div v-if="loader">
{{ load(true) }}
</div>
<div v-else="loader">
{{ load(false) }}
</div>
</div>


</template>

<script>

import nav from './Nav.vue';

    export default {
	data(){
	  return {
	  kurses:{},
	  pagination:[],
	  url:'',
	  time :'',
	  loader:true,
	  url:''
	  }
	},
	

	
	props: [
	'filter',
	
	],
		components: {
	  nav: nav,
  },
        mounted() {
		this.getkurses();
		            this.filter();

            //console.log(this.kurses)
			
			//this.paginate(this.kurses);
        },
	   methods: {
getResults(page = 1) {
						   			this.loader = false;

		   axios({
			   method: 'get', //you can set what request you want to be
               url: '/kurses-ajax?page='+page,
			   
           headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

			   
		   })
			.then(response => {
	          	this.kurses = response.data.kurs;
				$('.ppp').html(response.data.content);
		   			this.loader = true;


             })
			},
			
			
		getImgUrl(pic) {
         return ('/upload/' + pic);
       },
	   getImgUrl2() {
         return ('no_img.jpg');
       },
	  
		  load(param){
			  if(param == true){
				  	$('.overlay').removeClass('over');

			  }else{
				  $('.overlay').addClass('over');


			  }
		  },
	   getkurses(){
		 
		   			this.loader = false;

	    axios({
			   method: 'get', //you can set what request you want to be
               url: '/kurses-ajax',
			   data: {filter: this.filter,},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	           console.log(response.data.content)

				this.kurses = response.data.kurs;
							$('.ppp').html(response.data.content);
							
									   			this.loader = true;


            })
			
		     return this.kurses;
		 },
		 
         kurs: function(event) {
			 
			 
         let val = event.target.value;
			
			
			
		axios({
			   method: 'get', //you can set what request you want to be
               url: '/kurses-ajax',
			   params:{val: val,razdel:'razdel'},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	          console.log(response.data)
			  this.kurses = response.data.kurs;
	          $('.ppp').html(response.data.content);
				})
			
			
			
			
			
			
			
         },
		 filter(){
			 
			 axios({
			   method: 'post', //you can set what request you want to be
               url: '/kurses-ajax',
			   data: {filters: 'filter'},

           headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},

			   
		   })
			.then(response => {
	          	let filtr = response.data;
				this.filters = filtr.key;
				//console.log(this.filters);
				//$('.ppp').html(response.data.content);
		   			//this.loader = true;


             })
			 
			 return this.filters;
		 },
		 
	}

    }
</script>
