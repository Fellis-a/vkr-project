<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <div id="vkr-single">
                            {{id}}
                            <a style="cursor: pointer; text-decoration: underline" v-on:click="navigate()">Navigate to Page1</a>
                        </div>
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   import router from '../app.js'

    export default {
        name: 'VkrSingle',
        data () {
            return {
                vkrs: {},
                id: 0,

            }
        },
        created() {
            this.id = this.$route.params.id;
        },
        
        methods: {
            navigate() {
                router.go(-1);
            },

            getVkrs(){
            axios.get('/api/vkrs')
            .then(response => {
                this.vkrs = response.data;
            });
        },
        }
        
    }
</script>
