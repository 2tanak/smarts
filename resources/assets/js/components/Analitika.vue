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
	 
     data(){
	  return {kurses:{},loader:true,filters:{},filter:'',razdel:0,page:6,lang:1,filter_class2:0,filter_class_flag:0,filter_smena_flag:0,filter_smena:{}
	  }
	},
	props: [
'id_razdel'
	],
	mounted() {
		
		//this.razdel= this.id_razdel;
		this.getonlinekurses();
		this.getonlinelesson();
		this.get_users_count();
		//this.filterrazdel();
     },
	watch: {
   
	  
    },
    methods: {
       load(param){if(param == true){$('.overlay2').removeClass('over2');}else{$('.overlay2').addClass('over2');}},
		  getonlinekurses(){//массив курсов по умолчанию
	   		  this.loader = false;
           axios({
			   method: 'get', 
               url: '/admin/analitika-online-kurs',
			   params: {filter:'filter'},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	       document.querySelector('#count_online_kurs').innerHTML = response.data.count;
                this.loader = true;
           })
			
		    
		 },
		 
           getonlinelesson(){//массив курсов по умолчанию
	   		  this.loader = false;
           axios({
			   method: 'get', 
               url: '/admin/analitika-online-lesson',
			   params: {filter:'filter'},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	         document.querySelector('#count_online_lesson').innerHTML = response.data.count_lesson;
                this.loader = true;
           })
			
		    
		 },
			
		   get_users_count(){//массив курсов по умолчанию
	   		  this.loader = false;
           axios({
			   method: 'get', 
               url: '/admin/analitika-users_count',
			   params: {filter:'filter'},
			   headers:{
			   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
             })
			.then(response => {
	         document.querySelector('#count_users').innerHTML = response.data.count_users;
                this.loader = true;
           })
			
		    
		 },
			
			
			
		 
	}

    }
</script>
