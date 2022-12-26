<template>
	<div class="container-fluid">
		
			<input type="text" class="form-control" v-model="searchInput" v-on:keyup.enter="handleSearch()" style="width: 500px" >
			<a href="javascript:void(0);" style="margin-left: 300px;"><i class="fa fa-search" ></i></a>
			
		<video-group v-bind:videos="videos"></video-group>

	</div>
	
</template>
<script>
	import VideoGroup from './VideoGroup.vue';
	import Search from './search';

    export default {
    	components: {
    		VideoGroup,
    	},
    	data(){
    		return{
    			videos:[],
    			searchInput:''
    		}
    	},
    	created() {
    		Search({apikey: '',
    			term: 'laravel repository',
    			items:10
    		}, 
    			response => this.videos = response);
    	},
    	methods: {
    		handleSearch(){
	    		Search({apikey: '',
	    			term: this.searchInput,
	    			items:10
	    		}, 
	    			response => this.videos = response);

    		}

    	}
}
</script>