import axios from 'axios';
import { defineStore } from 'pinia';

export const useCommentStore = defineStore('comments', {
    state: () => ({ comments: [] }),
    actions: {
      async fetchPostComments(post_id) {
        try {
            const response = await axios.get(`/api/get/${post_id}/comments`);
            this.comments = response.data;
        } catch (error) {
            console.log(error);
        }
      },
      async storeComment(post_id,user_id,body) {
        try {
            const response = await axios.post('/api/add/comment', {
                user_id,
                post_id,
                body
            });
            this.comments.unshift(response.data);
        } catch (error) {
            console.log(error);
        }
      },
    },
});