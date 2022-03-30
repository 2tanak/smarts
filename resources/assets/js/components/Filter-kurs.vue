<template>

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
		
</template>

<script>
import axios from 'axios';
import navs from './Nav.vue';

import $ from 'jquery';

    export default {
			data(){
				  return {
			 filters:[],
		     kurses:{},
			 test:'',
				  }
			},
  components: {
	  navs:navs,
  },

		methods: {

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
			  	 //this.$store.commit('changetest', 'vova molod');
                 //this.test= 5555555555555555555;
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
		 
	
      },
	  
		
        mounted() {
            this.filter();
        }
    }
</script>
