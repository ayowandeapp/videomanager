<template>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="card-header">My Playlist</div>
					  <div class="card-body">
					  	<table class="table table-borderless table-striped table-hover">
					  		<thead>
					  			<tr>
					  				<th>Name</th>
					  				<th>Video Count</th>
					  				<th>Last Updated</th>
					  				<th>Actions</th>
					  			</tr>
					  		</thead>
					  		<tbody>
					  			<tr v-for="list in playlists">
					  				<td>{{ list.name }}</td>
					  				<td>{{ list.playlist_entries.length }}</td>
					  				<td>{{ list.updated_at }}</td>
					  				<td><div class="btn-group">
					  					<button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown">Action</button>
					  					<div class="dropdown-menu">
					  						<a class="dropdown-item" href="#">Edit</a>
					  						<a class="dropdown-item" href="#">Delete</a>
					  					</div>
					  				</div></td>
					  			</tr>
					  		</tbody>
					  		
					  	</table>
					  </div>
					</div>				
				</div>
			</div>
		</div>
		
	</div>
</template>

<script>
	export default{
		data(){
			return{
				playlists:[],
			}
		},
		created() {
			this.fetchPlaylists();

		},
		methods:{
			fetchPlaylists(){
				axios.get('/user/playlist').then(response=>{
					console.log(response.data);
					this.playlists = response.data;
				})
			}
		}

	}
</script>