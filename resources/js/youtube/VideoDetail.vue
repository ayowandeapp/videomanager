<template>
	<div class="container">
		
			<h1>video detail</h1>

	</div>
	
</template>
<script>

    export default {
    	components: {

    	},
    	data(){
    		return{
    			
    		}
    	},
    	created() {

    		console.log(this.$route.params.id);
    		if(this.$route.params.video === undefined){
    			this.$router.push({path: '/'});
    		}

    	},
    	methods: {



    	}
}
</script>