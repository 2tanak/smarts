<template>
    <div>
	{{test2}}
	
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
import paginate from './Paginate.vue';

    export default {
	data(){
	  return {
	  kurses:{},
	  pagination:[],
	  url:'',
	  time :'',
	  loader:true,
	  url:'',
	  test2:'zzzzzzzzzzzzzzzzzz'
	  }
	},
	

	
	props: [
	'test',
	
	],
		components: {
	  paginate: paginate,
  },
    		        watch: {
					 test() {
    vm.$forceUpdate();
						 		this.test2 = 'strax';


						 //alert(this.test)
        },
		
				},

        mounted() {
		//this.getkurses();
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
		            this.test2 ='66666666666666666';

		         //this.test = this.$store.getters.viewtest;

		   			

	    
		 }
	}

    }
</script>
