<template>
    <div>
	  <div class="filter">
			  <h5 class="filter-title">
             ФИЛЬТР
             </h5>

			 <div class="filter-type">
            <select @change="kurs" id='razdel'>
          <option some-data="key" v-for="(item, key) in filters" :value="key">
			    {{item}}
				</option>
              </select>
            <div class="select-icon">
              <img src="images/more.png">
            </div>
          </div>
		  <div class="filter-type">
               <select @change="kols" id="kol">
           <option value="6" >по умолчанию</option>
                <option value="30" >30 уроков</option>
                <option value="20" >20 уроков</option>
                <option value="15" >15 уроков</option>
                <option value="10" >10 уроков</option>
                <option value="4" >4 урока</option>
            </select>
              <div class="select-icon">
                <img src="images/more.png">
              </div>
            </div>
		  <div class="filter-type">
              <select @change="pricess" id="price">
			      <option value="0" >Все цены</option>
               <option value="15000" >от 15 000 KZT</option>
                  <option value="10000" >от 10 000 KZT</option>
                  <option value ="5000" >от 5 000 KZT</option>
                  <option value="3000" >от 3 000 KZT</option>
                  <option value="2000">от 2 000 KZT</option>
                </select>
                <div class="select-icon">
                  <img src="images/more.png">
                </div>
              </div>
		  </div>
		  <div class='ppp'></div>
				<pagination :data="kurses" @pagination-change-page="getResults"></pagination>

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
     data(){
	  return {kurses:{},loader:true,filters:{},filter:'',val:0,razdel:0,page:6,prices:0,
	  }
	},
	
	mounted() {
		 this.filterrazdel();
     },
    methods: {
		paybox: function(){
			
			
			
			
			
		 axios({
			   method: 'post', 
               url: 'https://testpay.post.kz/api/v0/orders/payment/',

			  params:{
				  amount: "200",
                  back_link: "https://test.test.com",
                  payment_webhook: "https://ticketon.kz/back_link",
                  email: "card_holder@gmail.com",
				  cardholder_name: "TEST TESTOV",
		          id: "e6da35ac-5ea0-48a5-b262-98e28e0a736f",
                  type:"card",
                  order_iin:"4654878646548756458",
			   //'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},


				  },
           headers:{ 
		   
		   'Content-Type': 'Application/json',
		   'Authorization':'Token 194a67a0c17dec7bc6514fcac5f170d74e4a7dda',
		  'Accept-Language': 'en',
		      'Access-Control-Allow-Credentials' : 'true',
            'Access-Control-Allow-Origin': '*',
			    'Access-Control-Allow-Methods': 'GET, POST, PATCH, DELETE, PUT, OPTIONS',
			    'Access-Control-Allow-Headers': 'Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With',
		   },
		   
		   })
		   
			.then(response => {
	          	console.log(response);
            })
			
			
		},
       getResults(page = 1) {
	    this.loader = false;
		   axios({
			   method: 'get', 
               url: '/kurses-ajax?page='+page,
			   params:{filter: this.filter,val: this.val,pages: this.page,razdel: this.razdel,price: this.prices},
           headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            })
			.then(response => {
	          	this.kurses = response.data.kurs;
				$('.ppp').html(response.data.content);
		   			this.loader = true;
            })
			
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
			   method: 'get', 
               url: '/kurses-ajax',
			   data: {filter: this.filter,},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	          // console.log(response.data.content)
                this.filter='default',
				this.kurses = response.data.kurs;
							$('.ppp').html(response.data.content);
						this.loader = true;


            })
			
		     return this.kurses;
		 },
		 kols: function(event){
			 
			 let val = event.target.value;
			 
			 //razdel = $('#razdel').val();
			 //this.razdel = razdel;
			 this.val = val;
			 this.page= val;
			 
		   	this.loader = false;

         axios({
			   method: 'get', //you can set what request you want to be
               url: '/kurses-ajax',
			   params:{val: val,filter:'kol',razdel: this.razdel,price: this.prices},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
	    .then(response => {
		  
	          console.log(response.data)
			  this.filter = 'kol';

			  this.kurses = response.data.kurs;
			  	 
				 this.loader = true;

	          $('.ppp').html(response.data.content);
				})
				
			 },
         pricess: function(event){
			 
			 this.loader = false;
             let val = event.target.value;
			 this.val = val;
			 this.prices= val;

			 this.filter = 'price';

         axios({
			   method: 'get', 
               url: '/kurses-ajax',
			   params:{val: val,filter:'price',razdel: this.razdel,pages: this.page},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
	    .then(response => {
		  console.log(response.data)
             this.kurses = response.data.kurs;
			 this.loader = true;
             $('.ppp').html(response.data.content);
				})
				
			 },
         
         kurs: function(event) {//фильтр раздел
		
		 	this.loader = false;
            let val = event.target.value;
             this.val = val;
			 this.razdel = val;
			axios({
			   method: 'get', //you can set what request you want to be
               url: '/kurses-ajax',
			   params:{val: val,filter:'razdel',pages: this.page,price: this.prices},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	          console.log(response.data)
			  this.filter = 'razdel';
			  this.kurses = response.data.kurs;
			  this.loader = true;
              $('.ppp').html(response.data.content);
				})
				},
			
			
			
			
			filterrazdel(){//загрузка массива разделов
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

              })
			 
			 return this.filters;
		    },
		 
			
			
			
		 
	}

    }
</script>
