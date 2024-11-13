<template>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="searchCanvas" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                {{ placeholder }}
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <input type="text" class="form-control" 
                :placeholder="placeholder"
                v-model="data.term"
                @change="searchForPostsByTerm"
                >
            <div v-if="data.posts.length" class="mt-2">
                <ul class="list-group">
                    <li class="list-group-item" v-for="post in data.posts" 
                        :key="post.id">
                        <a :href="`http://127.0.0.1:8000/posts/${post.slug}/show`">
                            {{ post.title_en }}
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="list-group mt-2" v-if="data.message">
                <li class="list-group-item">
                    {{ data.message }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
    import axios from "axios";
    import { reactive } from "vue";

    const data = reactive({
        posts: [],
        term: '',
        message: ''
    });

    const props = defineProps({
        placeholder: {
            type: String,
            required: true
        }
    });

    const searchForPostsByTerm = async () => {
        clearResults();
        if(data.term.length >= 3) {
            try {
                const response = await axios.post('/api/search', {
                    searchTerm: data.term
                });
                if(response.data.length) {
                    data.posts = response.data;
                }else {
                    data.message = "No results found";
                }
            } catch (error) {
                console.log(error);
            }
        }
    }

    const clearResults = () => {
        data.posts = [];
        data.message = '';
    } 
</script>

<style>

</style>