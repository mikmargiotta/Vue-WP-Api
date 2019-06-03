var axiosConfig = {
    headers: {
        'X-WP-Nonce': wpApiSettings.nonce
    }
};

var app = new Vue({
  el: '#app',
    data: {
        posts: [{title: 'prova'}],
        title: "",
    },
    mounted () {
        this.getPosts();
    },
    methods:{
        getPosts(){
            axios
            .get(wpApiSettings.root + 'wp/v2/posts')
            .then(response => {
                this.posts = response.data;
                console.log(response.data);
            })
            .catch(error => (this.posts = error))
        },
        addPost(){
            var postData = {
              title: this.title,
              status: 'publish'
            };

            axios.post(wpApiSettings.root + 'wp/v2/posts', postData, axiosConfig)
            .then((response) => {
              console.log(response.data);
              this.getPosts();
              this.title = '';
            })
            .catch(error => (this.posts = error))
        },
        updatePost(id, index){
            var postData = {
              title: this.posts[index].title.rendered,
            };

            axios.post(wpApiSettings.root + 'wp/v2/posts/'+id, postData, axiosConfig)
            .then((response) => {
              console.log(response.data);
              this.getPosts();
            })
            .catch(error => (this.posts = error))
        },
        removePost(id){
            axios.delete(wpApiSettings.root + 'wp/v2/posts/'+id, axiosConfig)
            .then((response) => {
              console.log(response.data);
              this.getPosts();
            })
            .catch(error => (this.posts = error))
        }
    }
})