<template>
    <div class="card my-2">
        <div class="card-header bg-white text-center">
            <CommentCount />
        </div>
        <div class="card-body" v-if="store.comments.length > 0">
            <div class="d-flex flex-column">
                <div class="p-3 border border-bottom mb-1"
                    v-for="comment in store.comments.slice(0,data.commentsToShow)" :key="comment.id">
                    <div class="flex-shrink-0">
                        <span class="fw-bold">
                            <i class="fas fa-user"></i>
                            {{ comment.user.name }}
                        </span>
                    </div>
                    <div class="flex-grow-1">
                        <i class="text-muted">
                            <i class="fas fa-clock"></i>
                            {{ comment.created_at }}
                        </i>
                        <p>
                            {{ comment.body }}
                        </p>
                    </div>
                </div>
                <button 
                    v-if="data.commentsToShow < store.comments.length"
                    @click="loadMoreComments"
                    class="btn btn-sm btn-link mt-2">
                    Load more
                </button>
            </div>
        </div>
    </div>
</template>

<script setup>
    import CommentCount from './CommentsCount.vue';
    import { onMounted, reactive } from 'vue';
    import { useCommentStore } from '../../stores/useCommentStore';

    const store = useCommentStore();

    const data = reactive({
        commentsToShow: 3
    });

    const props = defineProps({
        post_id: {
            type: Number,
            required: true
        }
    });

    const loadMoreComments = () => {
        if(data.commentsToShow > store.comments.length) {
            return;
        }else {
            data.commentsToShow = data.commentsToShow + 3;
        }
    }

    onMounted(() => store.fetchPostComments(props.post_id));
</script>

<style scoped>
</style>
