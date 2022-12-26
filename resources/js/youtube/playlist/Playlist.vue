<template>
	<div class="card">
		<div class="card-body">
			<button class="btn btn-primary btn-ssm" @click="openPlaylist()" v-if="!showPlaylist">Add</button>
			<button class="btn btn-primary btn-ssm" @click="closePlaylist()" v-if="showPlaylist">Close</button>
			<div v-if="loading">
				<i class="fa fa-spinner fa-spin" style="font-size:24px"></i>				
			</div>
			<div v-if="!loading">
				<div class="list-wrapper" v-if="showPlaylist">
					<notifications group="foo" :classes="notificationClasses" />
				<div class="list">
					<h4>My playlist</h4>
					<ul class="list-group">
						<li class="list-group-item" v-for="list in playlists" v-bind:key="list.id" >{{list.name}}<button class="btn btn-dark btn-sm float-right" @click="saveToPlaylist(list.id)">Add to PlayList</button></li>
					</ul>
				</div>
				<br>
					<form method="post" @submit.prevent="addPlaylist()">
						<div class="form-group row">
							<div class="col-sm-6">
								<input type="text" placeholder="create new playlist" class="form-control" v-model="name">
							</div>
							<div class="col-sm-3"><input type="checkbox" v-model="isprivate"> Private</div>
							<div class="col-sm-3"><input type="submit" class="btn btn-success" value="Add Playlist"></div>
						</div>
					</form>
			</div>
			</div>
			
		</div>
	</div>
</template>

<script>

export default {
	data() {
		return {
			showPlaylist: false,
			playlists: [],
			name: '',
			isprivate: false,
			loading: false,
			notificationClasses:'',
		}
	},
	created(){
		window.eventBus.$on('success', data =>{
			this.notificationClasses = 'vue-notification success';
			this.$notify({
			  group: 'foo',
			  title: 'Success!',
			  text: data
			});

		});
		window.eventBus.$on('error', data =>{
			this.notificationClasses = 'vue-notification error';
			this.$notify({
			  group: 'foo',
			  title: 'Error!',
			  text: data
			});

		});

	},
	methods:{
		closePlaylist(){
			this.showPlaylist = !this.showPlaylist;
		},
		openPlaylist(){
			this.loading = true;
			this.loadUserPlaylist();
		},
		loadUserPlaylist(){
			this.showPlaylist = !this.showPlaylist;
    		var url = window.Laravel.basePath;
			axios.get(url+'user/playlist').then(response=>{
				setTimeout(()=>{
					this.playlists = response.data;
					this.loading = false;
				},300)

			})
		},
		addPlaylist(){
			//console.log(this.name, this.isprivate);
			let data = {
				name:this.name,
				isprivate:this.isprivate
			};
			axios.post('/user/playlist', data).then(response=>{
				this.name = '';
				this.isprivate = '';
				this.playlists.unshift(response.data);
				window.eventBus.$emit('success', 'Playlist Created Successfully!');
			})
			.catch(error => {
				//console.error(error.response);
				window.eventBus.$emit('error', error.response.data.message);

			})

		},
		saveToPlaylist(id){
			//console.log(this.$route.params.id, id);
			let data = {
				video_id:this.$route.params.id,
				playlist_id:id
			};
			axios.post('/user/playlist-entry', data).then(response=>{
			//console.log(response.data);
			//alert success using vue event
			window.eventBus.$emit('success', 'Video Added to Playlist!');
			})
			.catch(error =>{
				//console.error(error.response);
				window.eventBus.$emit('error', error.response.data.message);


			})

		}

	}

}

</script>