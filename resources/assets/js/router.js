import VueRouter from 'vue-router';
import Home from './components/ExampleComponent';


export default new VueRouter({
	routes:[
	{
	'path':	'/home',
	 'component':Home
	}
	],
	mode:'history'
	
})