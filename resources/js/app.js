import './bootstrap';
import { createApp } from 'vue/dist/vue.esm-bundler.js';
import { createPinia } from 'pinia';
import CommentList from './components/comments/CommentList.vue';
import AddComment from './components/comments/AddComment.vue';
import SearchButton from './components/search/SearchButton.vue';
import searchTab from './components/search/searchTab.vue';
import Like from './components/likes/Like.vue';


const app = createApp({});

const pinia = createPinia();

app.component('comment-list', CommentList);
app.component('add-comment', AddComment);
app.component('search-button', SearchButton);
app.component('search-tab', searchTab);
app.component('like', Like);

app.use(pinia);

app.mount("#app");


